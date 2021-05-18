# User folder management

APIs for managing user folders

## Display a listing of the folders for the authenticated user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "My Folder 1",
        "user_id": 1,
        "created_at": "2021-05-17 14:15:15",
        "updated_at": "2021-05-17 14:15:15",
        "notes": [
            {
                "id": 1,
                "name": "My note 1",
                "is_public": 0,
                "noteable_type": "text",
                "created_at": "2021-05-17 14:15:15",
                "updated_at": "2021-05-17 14:15:15",
                "noteable": {
                    "id": 1,
                    "content": "text work",
                    "created_at": "2021-05-17 14:15:15",
                    "updated_at": "2021-05-17 14:15:15"
                }
            }
        ]
    },
    {
        "id": 2,
        "name": "My Folder 2",
        "user_id": 1,
        "created_at": "2021-05-17 14:15:15",
        "updated_at": "2021-05-17 14:15:15",
        "notes": [
            {
                "id": 2,
                "name": "My note 1",
                "is_public": 1,
                "noteable_type": "list",
                "created_at": "2021-05-17 14:15:15",
                "updated_at": "2021-05-17 14:15:15",
                "noteable": {
                    "id": 2,
                    "created_at": "2021-05-17 14:15:15",
                    "updated_at": "2021-05-17 14:15:15",
                    "items": [
                        {
                            "id": 4,
                            "content": "Cool mine text something space food hobby wine",
                            "note_list_id": 2,
                            "created_at": "2021-05-17 14:15:15",
                            "updated_at": "2021-05-17 14:15:15"
                        },
                        {
                            "id": 5,
                            "content": "Cool note text work something hobby status folks",
                            "note_list_id": 2,
                            "created_at": "2021-05-17 14:15:15",
                            "updated_at": "2021-05-17 14:15:15"
                        },
                        {
                            "id": 6,
                            "content": "note mine something space junk food play status",
                            "note_list_id": 2,
                            "created_at": "2021-05-17 14:15:15",
                            "updated_at": "2021-05-17 14:15:15"
                        }
                    ]
                }
            }
        ]
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`folder`**



## Store a newly created folder in storage for the authenticated user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost/folder" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Folder 1"}'

```


> Example response (200):

```json
{
    "name": "Folder 1",
    "user_id": 2,
    "updated_at": "2021-05-17 12:58:28",
    "created_at": "2021-05-17 12:58:28",
    "id": 7
}
```

### Request
<small class="badge badge-black">POST</small>
 **`folder`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    The name of the folder.



## Display the specified folder.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "id": 1,
    "name": "My Folder 1",
    "user_id": 1,
    "created_at": "2021-05-17 14:15:15",
    "updated_at": "2021-05-17 14:15:15",
    "notes": [
        {
            "id": 1,
            "name": "My note 1",
            "is_public": 0,
            "noteable_type": "text",
            "created_at": "2021-05-17 14:15:15",
            "updated_at": "2021-05-17 14:15:15",
            "noteable": {
                "id": 1,
                "content": "text work",
                "created_at": "2021-05-17 14:15:15",
                "updated_at": "2021-05-17 14:15:15"
            }
        },
        {
            "id": 2,
            "name": "My note 2",
            "is_public": 1,
            "noteable_type": "list",
            "created_at": "2021-05-17 14:15:15",
            "updated_at": "2021-05-17 14:15:15",
            "noteable": {
                "id": 1,
                "created_at": "2021-05-17 14:15:15",
                "updated_at": "2021-05-17 14:15:15",
                "items": [
                    {
                        "id": 1,
                        "content": "Cool note text work something space junk hobby play",
                        "note_list_id": 1,
                        "created_at": "2021-05-17 14:15:15",
                        "updated_at": "2021-05-17 14:15:15"
                    },
                    {
                        "id": 2,
                        "content": "note mine text work something space junk status folks",
                        "note_list_id": 1,
                        "created_at": "2021-05-17 14:15:15",
                        "updated_at": "2021-05-17 14:15:15"
                    },
                    {
                        "id": 3,
                        "content": "Cool note mine text something food wine status folks",
                        "note_list_id": 1,
                        "created_at": "2021-05-17 14:15:15",
                        "updated_at": "2021-05-17 14:15:15"
                    }
                ]
            }
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`folder/{folder_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.



## Update the specified folder in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost/folder/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Cool Folder Name"}'

```


> Example response (200):

```json
{
    "id": 1,
    "name": "Cool Folder Name",
    "user_id": 2,
    "created_at": "2021-05-17 10:58:10",
    "updated_at": "2021-05-17 12:59:15"
}
```

### Request
<small class="badge badge-darkblue">PUT</small>
 **`folder/{folder_id}`**

<small class="badge badge-purple">PATCH</small>
 **`folder/{folder_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    The name of the folder.



## Remove the specified folder from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost/folder/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```


> Example response (200):

```json
{
    "status": "success"
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`folder/{folder_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.




