# train_model.py
import pandas as pd
import numpy as np
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import StandardScaler
import joblib
import os

print("Starting model training...")

# Create sample dataset
def create_sample_dataset():
    print("Creating sample dataset...")
    # Extended dataset with more samples
    data = {
        'N': [90, 85, 60, 75, 80, 70, 65, 55, 95, 40, 82, 78, 62, 71, 88, 45, 92, 58, 67, 73],
        'P': [42, 58, 55, 35, 45, 50, 40, 30, 60, 25, 44, 52, 48, 38, 47, 28, 55, 32, 42, 53],
        'K': [43, 41, 44, 40, 42, 38, 35, 30, 50, 20, 41, 43, 39, 37, 45, 25, 48, 33, 36, 42],
        'temperature': [20, 22, 25, 24, 23, 21, 26, 27, 28, 29, 22, 24, 26, 23, 25, 30, 27, 29, 24, 22],
        'humidity': [82, 80, 85, 78, 75, 70, 65, 60, 55, 50, 81, 76, 72, 68, 73, 45, 58, 52, 67, 79],
        'ph': [6.5, 6.8, 7.0, 6.2, 6.9, 7.2, 6.0, 5.8, 6.7, 5.5, 6.6, 6.3, 6.8, 6.1, 6.4, 5.3, 6.9, 6.2, 7.1, 5.9],
        'rainfall': [202, 210, 230, 200, 220, 180, 150, 120, 250, 100, 205, 195, 185, 175, 215, 90, 240, 130, 160, 190],
        'crop': ['rice', 'maize', 'wheat', 'rice', 'maize', 'wheat', 'cotton', 'sugarcane', 'rice', 'cotton',
                 'rice', 'maize', 'wheat', 'cotton', 'maize', 'sugarcane', 'rice', 'sugarcane', 'cotton', 'wheat']
    }
    return pd.DataFrame(data)

# Load or create dataset
print("Loading dataset...")
df = create_sample_dataset()

print(f"Dataset shape: {df.shape}")
print(f"Crops in dataset: {df['crop'].unique()}")

# Prepare features and target
X = df[['N', 'P', 'K', 'temperature', 'humidity', 'ph', 'rainfall']]
y = df['crop']

# Scale the features
print("Scaling features...")
scaler = StandardScaler()
X_scaled = scaler.fit_transform(X)

# Train the model
print("Training Random Forest model...")
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_scaled, y)

# Get current directory
current_dir = os.path.dirname(os.path.abspath(__file__))
model_path = os.path.join(current_dir, 'crop_model.pkl')
scaler_path = os.path.join(current_dir, 'scaler.pkl')

# Save the model and scaler
print(f"Saving model to: {model_path}")
joblib.dump(model, model_path)

print(f"Saving scaler to: {scaler_path}")
joblib.dump(scaler, scaler_path)

# Test prediction
print("\nTesting model with sample input...")
test_features = [[80, 45, 40, 25, 75, 6.5, 200]]
test_scaled = scaler.transform(test_features)
prediction = model.predict(test_scaled)[0]
confidence = max(model.predict_proba(test_scaled)[0])

print(f"Test prediction: {prediction}")
print(f"Confidence: {confidence:.2%}")
print("\n✅ Model training complete! Files saved successfully.")
print(f"📁 Location: {current_dir}")