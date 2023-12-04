# train_model.py

import joblib
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import MinMaxScaler
from sklearn.neighbors import KNeighborsClassifier

# Load your dataset and perform necessary preprocessing
dataset = pd.read_csv("kerala.csv", sep=",")

x = dataset.iloc[:,2 :14].values
y = dataset.iloc[:, -1].values

x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.30, random_state=0)

# # MinMaxScaler
scaler = MinMaxScaler()
scaler.fit(x_train)

x_train = scaler.transform(x_train)
x_test = scaler.transform(x_test)

# Create and train the machine learning model
classifier = KNeighborsClassifier(n_neighbors=3)
classifier.fit(x_train, y_train)

# # Save the model to a file
joblib.dump(classifier, "model.pkl")
