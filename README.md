# apirest_geniat
apirest_geniat


{
	"info": {
		"_postman_id": "ce9e7c15-91cc-4fdd-b475-d8bb7298740b",
		"name": "Api",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Login",
			"item": [
				{
					"name": "login",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "email",
									"value": "correo@gmail.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Torres",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/login",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"login"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Post",
			"item": [
				{
					"name": "Get all",
					"protocolProfileBehavior": {
						"disableBodyPruning": true
					},
					"request": {
						"auth": {
							"type": "noauth"
						},
						"method": "GET",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NTY0MjIsImF1ZCI6ImFhNjg2YTg0YzUwMDc2MzhhMDE1YmQ1NjljYTkxOTZkNDQ2NzA3YzAiLCJkYXRhIjp7ImlkIjoiOSIsImVtYWlsIjoiY29ycmVvMUBnbWFpbC5jb20iLCJyb2xfaWQiOiIzIn19.e0C2Lo2OV4wembDOxCFIHlhGpNeYsSwz003FswObUP",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/post?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NjE4OTYsImF1ZCI6ImQ0MmIyMGQ3MTM3ZDBjNjhjYTc1ZDc3MGQ4OGMxMzUzZDRlMjE2NTEiLCJkYXRhIjp7ImlkIjoiMSIsImVtYWlsIjoiY29ycmVvQGdtYWlsLmNvbSIsInJvbF9pZCI6IjUifX0.T7SpDAPW-jQOdUQYO0xDx5DPLAAofJitFXhailBh0fk",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"post"
							],
							"query": [
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NjE4OTYsImF1ZCI6ImQ0MmIyMGQ3MTM3ZDBjNjhjYTc1ZDc3MGQ4OGMxMzUzZDRlMjE2NTEiLCJkYXRhIjp7ImlkIjoiMSIsImVtYWlsIjoiY29ycmVvQGdtYWlsLmNvbSIsInJvbF9pZCI6IjUifX0.T7SpDAPW-jQOdUQYO0xDx5DPLAAofJitFXhailBh0fk"
								}
							]
						}
					},
					"response": []
				},
				{
					"name": "Add",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "title",
									"value": "Prueba3",
									"type": "text"
								},
								{
									"key": "description",
									"value": "Descrip3",
									"type": "text"
								},
								{
									"key": "status",
									"value": "1",
									"description": "1 = Activado, 0 = Desactivado",
									"type": "text"
								},
								{
									"key": "user_created_id",
									"value": "1",
									"description": "id del usuario ",
									"type": "text"
								},
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NjE4OTYsImF1ZCI6ImQ0MmIyMGQ3MTM3ZDBjNjhjYTc1ZDc3MGQ4OGMxMzUzZDRlMjE2NTEiLCJkYXRhIjp7ImlkIjoiMSIsImVtYWlsIjoiY29ycmVvQGdtYWlsLmNvbSIsInJvbF9pZCI6IjUifX0.T7SpDAPW-jQOdUQYO0xDx5DPLAAofJitFXhailBh0fk",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/post/add",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"post",
								"add"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update",
					"request": {
						"auth": {
							"type": "noauth"
						},
						"method": "PUT",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "title",
									"value": "TTTT",
									"type": "text"
								},
								{
									"key": "description",
									"value": "sdf",
									"type": "text"
								},
								{
									"key": "status",
									"value": "1",
									"type": "text"
								},
								{
									"key": "user_created_id",
									"value": "1",
									"type": "text"
								},
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NjMwODgsImF1ZCI6ImFhNjg2YTg0YzUwMDc2MzhhMDE1YmQ1NjljYTkxOTZkNDQ2NzA3YzAiLCJkYXRhIjp7ImlkIjoiMSIsImVtYWlsIjoiY29ycmVvQGdtYWlsLmNvbSIsInJvbF9pZCI6IjUifX0.JvVvMH-HBujQtu4m0qmHaB-gSoHUJoXmAfVQkRca3Ho",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/post/update/1",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"post",
								"update",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete",
					"request": {
						"method": "PUT",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NTgwNzYsImF1ZCI6ImFhNjg2YTg0YzUwMDc2MzhhMDE1YmQ1NjljYTkxOTZkNDQ2NzA3YzAiLCJkYXRhIjp7ImlkIjoiOSIsImVtYWlsIjoiY29ycmVvMUBnbWFpbC5jb20iLCJyb2xfaWQiOiI0In19.Fz4OEdOsdHrzmx3cyr8RK3ShbTdV4Q-6EDCocDZLyRU",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/post/delete/3",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"post",
								"delete",
								"3"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Users",
			"item": [
				{
					"name": "User add",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "name",
									"value": "Mazaa",
									"type": "text"
								},
								{
									"key": "lastname",
									"value": "Pru",
									"type": "text"
								},
								{
									"key": "email",
									"value": "Pru1@sd.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "Prueba",
									"type": "text"
								},
								{
									"key": "rol_id",
									"value": "1",
									"type": "text"
								},
								{
									"key": "status",
									"value": "1",
									"type": "text"
								},
								{
									"key": "token",
									"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NTA4NTg0MDQsImF1ZCI6ImFhNjg2YTg0YzUwMDc2MzhhMDE1YmQ1NjljYTkxOTZkNDQ2NzA3YzAiLCJkYXRhIjp7ImlkIjoiOSIsImVtYWlsIjoiY29ycmVvMUBnbWFpbC5jb20iLCJyb2xfaWQiOiI1In19.5M_npluidgDjsVcpA6HA-1JhM6FXJ1_GA7ULrAs8h5k",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://geniat.pruebasintranet.site/users/add",
							"protocol": "http",
							"host": [
								"geniat",
								"pruebasintranet",
								"site"
							],
							"path": [
								"users",
								"add"
							]
						}
					},
					"response": []
				}
			]
		}
	]
}
