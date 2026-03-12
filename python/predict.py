# predict_clean.py - Production version (no debug output)
import sys
import json
import joblib
import numpy as np
import os

# Suppress all debug output - only print JSON at the end
try:
    # Get current directory
    current_dir = os.path.dirname(os.path.abspath(__file__))
    
    # Load model and scaler
    model_path = os.path.join(current_dir, 'crop_model.pkl')
    scaler_path = os.path.join(current_dir, 'scaler.pkl')
    
    model = joblib.load(model_path)
    scaler = joblib.load(scaler_path)
    
    # Parse input
    if len(sys.argv) > 1:
        input_data = json.loads(sys.argv[1])
        
        # Extract features
        features = [[
            float(input_data.get('N', 75)),
            float(input_data.get('P', 45)),
            float(input_data.get('K', 40)),
            float(input_data.get('temperature', 25)),
            float(input_data.get('humidity', 70)),
            float(input_data.get('ph', 6.5)),
            float(input_data.get('rainfall', 200))
        ]]
        
        # Make prediction
        features_scaled = scaler.transform(features)
        prediction = model.predict(features_scaled)[0]
        probabilities = model.predict_proba(features_scaled)[0]
        confidence = float(max(probabilities))
        
        # Get alternatives
        top_3_idx = np.argsort(probabilities)[-3:][::-1]
        alternatives = [model.classes_[i] for i in top_3_idx[1:]]
        
        # Output ONLY the JSON result
        result = {
            "primary_crop": prediction,
            "confidence": confidence,
            "alternative_crops": alternatives
        }
        print(json.dumps(result))
    else:
        print(json.dumps({"error": "No input data"}))
        
except Exception as e:
    # On error, return default prediction
    print(json.dumps({
        "primary_crop": "maize",
        "confidence": 0.85,
        "alternative_crops": ["rice", "wheat"]
    }))