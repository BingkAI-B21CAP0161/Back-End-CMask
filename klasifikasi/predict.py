from PIL import Image
import numpy as np
from tensorflow.keras.models import load_model


# Parameters
input_size = (224, 224)
#define input shape
channel = (3,)
input_shape = input_size + channel
#define labels
labels = ['Bener', 'Teu Make', 'Katingal Dagu', 'Katingal Irung', 'Katingal Irung jeung biwir']

def preprocess(img, input_size):
    nimg = img.convert('RGB').resize(input_size, resample=0)
    img_arr = (np.array(nimg))/255
    return img_arr

def reshape(imgs_arr):
    return np.stack(imgs_arr, axis=0)


model = load_model("/opt/lampp/htdocs/backend/klasifikasi/model/modelna.h5", compile=False)

# read image
im = Image.open('/opt/lampp/htdocs/backend/upload/images/021.png')
X = preprocess(im, input_size)
X = reshape([X])
y = model.predict(X)

print(labels[np.argmax(y)], np.max(y))
