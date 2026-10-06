''' req_goback.py '''
import requests

url = 'http://localhost:8000/goback.php'

response = requests.get(url)

print(response)
print(response.text)
