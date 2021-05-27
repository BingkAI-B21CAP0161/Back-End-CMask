# Klasifikasi Wajah
# CMask-Project-Classification-Face


#!/usr/bin/python3
import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
import tensorflow as tf
from PIL import Image as gambar
import numpy as np
# import json

pathModel = "/opt/lampp/htdocs/backend/klasifikasi/model/model_scenario_cnn1.h5"
pathImage = "/opt/lampp/htdocs/backend/upload/images"

model = tf.keras.models.load_model(pathModel)
# model.summary()
input_size = (224, 224)
channel = (3,)
input_shape = input_size + channel
labels = ['Bener', 'Tidak Menggunakan', 'Terlihat Dagu',
          'Terlihat Hidung', 'Terlihat Hidung dan Mulut']


def preprocess(img, input_size):
    nimg = img.convert('RGB').resize(input_size, resample=0)
    img_arr = (np.array(nimg))/255
    return img_arr


def reshape(imgs_arr):
    return np.stack(imgs_arr, axis=0)

# Mengambil file terbaru yang dimasukan keadalam folder


def getNewFile():
    path = pathImage
    files = os.listdir(path)
    paths = [os.path.join(path, basename) for basename in files]
    return max(paths, key=os.path.getctime)

# Untuk prediksi model


def predict():
    print(getNewFile())
    im = gambar.open(getNewFile())
    X = preprocess(im, input_size)
    X = reshape([X])
    y = model.predict(X)
    label = labels[np.argmax(y)]
    akurasi = np.max(y)

    hasil = {
        "keterangan": label,
        "nilaiAkurat": akurasi
    }

    return hasil


print(predict())
