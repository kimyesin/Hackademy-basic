''' poc.py - index.php 에 get 요청 보내기 (상태코드 확인) '''
import requests

url = 'http://localhost:8000/index.php'

response = requests.get(url)

print(response)
