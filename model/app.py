# app.py

from flask import Flask, render_template, request, jsonify
import numpy as np
import joblib

app = Flask(__name__)

# Load the trained machine learning model
model = joblib.load("model.pkl")

# Home route
@app.route("/")
def home():
    return render_template("index.html")

# Prediction route
@app.route("/predict", methods=["POST"])
def predict():
    if request.method == "POST":
        # Get input features from the form
        feature1 = float(request.form["Tahun"])
        feature2 = float(request.form["Januari"])
        feature3 = float(request.form["Februari"])
        feature4 = float(request.form["Maret"])
        feature5 = float(request.form["April"])
        feature6 = float(request.form["Mei"])
        feature7 = float(request.form["Juni"])
        feature8 = float(request.form["Juli"])
        feature9 = float(request.form["Agustus"])
        feature10 = float(request.form["September"])
        feature11 = float(request.form["Oktober"])
        feature12 = float(request.form["November"])
        feature13 = float(request.form["Desember"])

        # Make a prediction using the loaded machine learning model
        prediction = model.predict([[feature1, feature2, feature3, feature4, feature5, feature6, feature7, feature8, feature9, feature10, feature11, feature12, feature13]])[0]
        return jsonify(prediction)

if __name__ == "__main__":
    app.run(debug=True)
