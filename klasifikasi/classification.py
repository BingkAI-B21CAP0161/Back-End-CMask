#! /usr/bin/python3

from PIL import Image
import os

os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
import numpy as np
import tensorflow as tf

from tensorflow.keras.preprocessing import image
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.applications import MobileNetV3Large
# import matplotlib.pyplot as plt

def klasifikasi():

    model = tf.keras.models.load_model("/opt/lampp/htdocs/backend/klasifikasi/model/modelna.h5")
    # model.summary()

    test_dir = "/opt/lampp/htdocs/backend/upload/"
    demo_datagen = ImageDataGenerator(rescale=1/255)
    demo_generator = demo_datagen.flow_from_directory(
        test_dir,
        target_size=(224, 224),
        batch_size=1,
        color_mode='rgb',
        class_mode='categorical')

    klasifikasi = model.predict(demo_generator)

    # os.system("clear")

    # Classification Class
    # 0 -> Bener Nganggena
    # 1 -> Teu Ngangge
    # 2 -> Katingal Dagu
    # 3 -> Katingal Irung
    # 4 -> Katingal Irung sareng biwir



    for i in klasifikasi:
        print(np.argmax(i))
        hasil = np.argmax(i)
    return np.argmax(i)
    
print(klasifikasi())



