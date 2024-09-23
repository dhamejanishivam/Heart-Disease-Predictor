# Heart Disease Predictor

This project is a **Heart Disease Prediction System** that uses machine learning to predict the likelihood of heart disease based on various medical input features. The model is trained on historical data and uses logistic regression to make predictions.

## Features

- **Machine Learning Model**: A logistic regression model is used to predict heart disease risk.
- **User-Friendly Web Interface**: A website interface (requires a MySQL database, not included in this repository) allows users to input data for prediction.
- **Direct Model Access**: If you're not interested in running the website, you can directly use the model by accessing the `main.py` script located in the `model` folder.

## How to Use

### 1. Direct Model Access (No Website)

If you don't need the web interface and just want to use the heart disease prediction model, you can run the `main.py` script in the `model` folder. This script takes input data (e.g., age, cholesterol level, etc.) and returns the prediction based on the trained model.

### 2. Website (Requires MySQL)

The project also includes a web application. However, **the website will not run locally on your machine** because the MySQL database is not provided in this repository.

#### Website Requirements:
- MySQL database
- Proper database configuration in the code (credentials and database connection)
  
If you want to use the web application, you'll need to:
- Set up a MySQL database
- Import the necessary tables (SQL not included here)
- Update the database configuration in the code to match your setup.

## Project Structure

- `model/` – Contains the machine learning model (`main.py`) and other related files.
- `/` – HTML templates for the website interface (not functional without a MySQL setup).
- `assets/` – CSS and JavaScript files for styling the website.

## Note

- This repository **does not include** the MySQL database or any sample data.
- You can still use the model directly without the need for a MySQL setup by running the `main.py` script inside the `model` folder.

## Requirements

- Python 3.x
- Libraries: `pandas`, `scikit-learn`, `flask` (if using the web interface)
  
## License

This project is open-source and available under the [MIT License](LICENSE).

