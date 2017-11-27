#!/usr/bin/python3

import sys
import pandas as pd
import json
import demjson
from sklearn.externals import joblib
from sklearn import preprocessing
try : 
	clf = joblib.load('/var/pythonscript/random_forest_clf.pkl') 
	labelEncoder = preprocessing.LabelEncoder()

	raw_data = sys.argv[1]
	#json_ojb = json.loads(sys.argv[1])
	raw_data = raw_data.replace("forcost_date", "\"forcost_date\"")
	raw_data = raw_data.replace("humidity", "\"humidity\"")
	raw_data = raw_data.replace("sky", "\"sky\"")
	raw_data = raw_data.replace("Rain", "\"Rain\"")
	raw_data = raw_data.replace("Clear", "\"Clear\"")
	raw_data = raw_data.replace("Clouds", "\"Clouds\"")
	raw_data = raw_data.replace("pressure", "\"pressure\"")
	raw_data = raw_data.replace("Snow", "\"Snow\"")
	raw_data = raw_data.replace("rain", "\"rain\"")
	raw_data = raw_data.replace("wind_speed", "\"wind_speed\"")
	raw_data = raw_data.replace("temperature", "\"temperature\"")

	pd_df = pd.read_json(raw_data)
	pd_df = pd_df.drop(["forcost_date"], 1)
	pd_df.sky = labelEncoder.fit_transform(pd_df.sky)
	pd_df = pd_df[["humidity", "temperature", "sky", "wind_speed", "rain"]]

	print(clf.predict(pd_df))
except:
	print ("[]")
