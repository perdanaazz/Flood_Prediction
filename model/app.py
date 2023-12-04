from flask import Flask, render_template, request, jsonify
import joblib

app = Flask(__name__)

# Load the trained machine learning model
model = joblib.load("model.pkl")

# Prediction route
@app.route("/predict", methods=["POST"])
def predict():
    if request.method == "POST":
        # Get input features from the form
        feature1 = float(request.form["feature1"])
        feature2 = float(request.form["feature2"])
        feature3 = float(request.form["feature3"])
        feature4 = float(request.form["feature4"])
        feature5 = float(request.form["feature5"])
        feature6 = float(request.form["feature6"])
        feature7 = float(request.form["feature7"])
        feature8 = float(request.form["feature8"])
        feature9 = float(request.form["feature9"])
        feature10 = float(request.form["feature10"])
        feature11 = float(request.form["feature11"])
        feature12 = float(request.form["feature12"])

        # Make a prediction using the loaded machine learning model
        prediction = model.predict([[feature1, feature2, feature3, feature4, feature5, feature6, feature7, feature8, feature9, feature10, feature11, feature12]])[0]

        # Return JSON
        return jsonify(prediction)

if __name__ == "__main__":
    app.run(debug=True)
