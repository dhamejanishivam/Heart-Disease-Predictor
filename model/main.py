from joblib import dump, load
import numpy as np
import pandas as pd
from sklearn.impute import SimpleImputer
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import StandardScaler
import sys
import os
import io

# 34,0,1,118,210,0,1,192,0,.7,2,0,2 == 1
# 52,1,0,128,204,1,1,156,1,1,1,0,0 == 0



model_path = 'C:/xampp/htdocs/project_main/model/modeln.joblib'
pipeline_path = 'C:/xampp/htdocs/project_main/model/pipe.joblib'


class Main():
    def __init__(self):
        # self.data = [[42, 1, 3, 148, 244, 0, 0, 178, 0, 0.8, 2, 2, 2]]
        self.base_dir = os.path.dirname(os.path.abspath(__file__))
        self.symptoms_input = sys.argv[1]  # Input comes as a single string
        
        self.data = list(map(float, self.symptoms_input.split(',')))
        self.data = [self.data]
        self.processingData()


    def processingData(self):
        # Create a DataFrame
        df = pd.DataFrame(self.data, columns=['age', 'sex', 'cp', 'trestbps', 'chol', 'fbs', 
                                        'restecg', 'thalach', 'exang', 'oldpeak','slope', 'ca','thal'])
        # Pipeline for data preprocessing
        my_pipeline = load(pipeline_path)
        # Transform the data
        self.prepared_data = my_pipeline.transform(df)
        self.loading_and_predicting()


    def loading_and_predicting(self):
        model = load(model_path)
        self.predict = model.predict(self.prepared_data)
        # print("type :",type(self.predict))
        # print(self.predict)
        self.savingResult()


    def savingResult(self):
        prediction = self.predict
        # print(prediction)
        if((prediction[0])*100) >= 90:
            prediction[0] = 0.90
        elif((prediction[0]*100)) <= 5:
            prediction[0] = 0.05
        # print(11)
        print(prediction[0])


        result = "Disease likely" if self.predict > 0.5 else "Disease unlikely"
        percent = int((round(float(self.predict[0]),2))*100)
        data = f"{percent}%\n{result}"
        # print(data)
        with open(f"{self.base_dir}\\result.txt","w") as f:
            f.write(data)





obj = Main()
