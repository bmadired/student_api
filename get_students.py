import requests

# Base URL of your PHP API
url = "http://localhost/backend/student-api.php"

try:
    # Send a GET request to fetch all students
    response = requests.get(url)

    # Check status code
    if response.status_code == 200:
        print("✅ Successfully retrieved data from API")
        print("Response JSON:\n", response.json())
    else:
        print(f"❌ Failed to retrieve data. Status Code: {response.status_code}")
        print("Response Text:", response.text)

except requests.exceptions.RequestException as e:
    print("⚠️ Error while connecting to API:", e)
