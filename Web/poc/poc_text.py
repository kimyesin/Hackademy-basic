''' poc_text.py - index.php 에 get 요청을 보내고 response.text 출력 '''
import requests

url = 'http://localhost:8000/index.php'

response = requests.get(url)

print(response.text)
