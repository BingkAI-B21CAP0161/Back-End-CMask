from mrcnn.config import Config
from mrcnn.model import MaskRCNN
from mrcnn.model import mold_image

from skimage import io
from matplotlib.colors import to_rgb
import numpy as np
import os
import time
import cv2

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
	NUM_CLASSES = 1 + 3 # Background + 3 classes

	# Set GPU configs for testing, would raise errors if not set this way
	GPU_COUNT = 1
	IMAGES_PER_GPU = 1


cfg = PredictionConfig()
mdl = MaskRCNN(mode='inference', model_dir=MODEL_DIR, config=cfg)
    
# Load model weights of the latest training epoch
weight_path = os.path.join(
    MODEL_DIR[1:-1],
    MODEL_NAME,
    'mask_rcnn_face_mask_detection_config_0050.h5'  # Name of weight
)
mdl.load_weights(weight_path, by_name=True)

IMG_PATH = '20210520_102134.jpg'
test_img = io.imread(IMG_PATH)


scaled_image = mold_image(test_img, cfg)
sample = np.expand_dims(scaled_image, 0)
yhat = mdl.detect(sample, verbose=0)[0]

print(yhat['rois'])
print(yhat['class_ids'])
print(yhat['scores'])


plotted_img = np.copy(test_img)
for i, box in enumerate(yhat['rois']):
  y1, x1, y2, x2 = box
  label_id = yhat['class_ids'][i]
  start = (x1, y1)
  end = (x2, y2)

  color = COLOR_MAP[label_id]
  color = to_rgb(color)
  color = (np.array(color)*255)
  color = tuple(color)
  plotted_img = cv2.rectangle(plotted_img, start, end, color, 3)


timestamp = int(time.time())
# This is just an example name format, change name based on need
save_path = '{}_{}'.format(timestamp, IMG_PATH)
io.imsave(
    save_path,
    plotted_img
)
