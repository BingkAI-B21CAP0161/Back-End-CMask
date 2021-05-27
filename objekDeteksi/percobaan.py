import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'

from mrcnn.config import Config
from mrcnn.model import MaskRCNN
from mrcnn.model import mold_image

from skimage import io
from matplotlib.colors import to_rgb
import numpy as np
import time
import cv2

pathImage = "/opt/lampp/htdocs/objectdetection/upload/images"
pathModel = "model/mask_rcnn_face_mask_detection_config_0050.h5"

# Load Model
MODEL_DIR = "\"/content/drive/MyDrive/capstone_machine_learning/masked_face_object_detection/notebooks/Saved_Models\""

CLASSES_MAP = {
    1: "without_mask",
    2: "mask_weared_incorrect",
    3: "with_mask"
}
COLOR_MAP = {
    1: "red",
    2: "yellow",
    3: "lime"
}


class PredictionConfig(Config):
	NAME = "face_mask_detection_config"
	NUM_CLASSES = 1 + 3  # Background + 3 classes
	# Set GPU configs for testing, would raise errors if not set this way
	GPU_COUNT = 1
	IMAGES_PER_GPU = 1


cfg = PredictionConfig()
mdl = MaskRCNN(mode='inference', model_dir=MODEL_DIR, config=cfg)

weight_path = os.path.join(
    MODEL_DIR[1:-1],
    'mask_rcnn_face_mask_detection_config_0050.h5'  # Name of weight
)
mdl.load_weights(weight_path, by_name=True)


def getNewFile():
    path = pathImage
    files = os.listdir(path)
    paths = [os.path.join(path, basename) for basename in files]
    return max(paths, key=os.path.getctime)

IMG_PATH = '20210520_102134.jpg'
test_img = io.imread(IMG_PATH)


scaled_image = mold_image(test_img, cfg)
sample = np.expand_dims(scaled_image, 0)
yhat = mdl.detect(sample, verbose=0)[0]
