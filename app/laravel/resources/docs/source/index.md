---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#User folder management


APIs for managing user folders
<!-- START_65292360d3e99c909d515ea59b01ceb4 -->
## Display a listing of the folders for the authenticated user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Folder 34",
        "user_id": 2,
        "created_at": "2021-05-17 10:58:10",
        "updated_at": "2021-05-17 11:40:04",
        "notes": [
            {
                "id": 1,
                "name": "Hello 1",
                "is_public": 1,
                "noteable_type": "text",
                "created_at": "2021-05-17 10:58:57",
                "updated_at": "2021-05-17 11:22:36",
                "noteable": {
                    "id": 1,
                    "content": "First nohte",
                    "created_at": "2021-05-17 10:58:57",
                    "updated_at": "2021-05-17 11:22:56"
                }
            },
            {
                "id": 2,
                "name": "Hello 2",
                "is_public": 0,
                "noteable_type": "text",
                "created_at": "2021-05-17 10:59:41",
                "updated_at": "2021-05-17 11:01:04",
                "noteable": {
                    "id": 2,
                    "content": "First not es",
                    "created_at": "2021-05-17 10:59:41",
                    "updated_at": "2021-05-17 11:00:54"
                }
            }
        ]
    }
]
```

### HTTP Request
`GET folder`


<!-- END_65292360d3e99c909d515ea59b01ceb4 -->

<!-- START_3e4b1d2631977d11b3cec1ef1e888eb4 -->
## Store a newly created folder in storage for the authenticated user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/folder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"alias"}'

```

```javascript
const url = new URL(
    "http://localhost/folder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "alias"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "name": "Folder 2",
    "user_id": 2,
    "updated_at": "2021-05-17 11:30:04",
    "created_at": "2021-05-17 11:30:04",
    "id": 5
}
```

### HTTP Request
`POST folder`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the folder.
    
<!-- END_3e4b1d2631977d11b3cec1ef1e888eb4 -->

<!-- START_15bb68853b52fb06e36f572b57b4931d -->
## Display the specified folder.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Folder 34",
    "user_id": 2,
    "created_at": "2021-05-17 10:58:10",
    "updated_at": "2021-05-17 11:40:04",
    "notes": [
        {
            "id": 1,
            "name": "Hello 1",
            "is_public": 1,
            "noteable_type": "text",
            "created_at": "2021-05-17 10:58:57",
            "updated_at": "2021-05-17 11:22:36"
        },
        {
            "id": 2,
            "name": "Hello sdfa",
            "is_public": 0,
            "noteable_type": "text",
            "created_at": "2021-05-17 10:59:41",
            "updated_at": "2021-05-17 11:01:04"
        }
    ]
}
```

### HTTP Request
`GET folder/{folder_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | int required The id of the folder.

<!-- END_15bb68853b52fb06e36f572b57b4931d -->

<!-- START_4f91bb6b7d4b54d16ba12bed5a83b789 -->
## Update the specified folder in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/folder/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ex"}'

```

```javascript
const url = new URL(
    "http://localhost/folder/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ex"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Folder 34",
    "user_id": 2,
    "created_at": "2021-05-17 10:58:10",
    "updated_at": "2021-05-17 11:40:04"
}
```

### HTTP Request
`PUT folder/{folder_id}`

`PATCH folder/{folder_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | int required The id of the folder.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the folder.
    
<!-- END_4f91bb6b7d4b54d16ba12bed5a83b789 -->

<!-- START_7747f9c083bba73abb25f1929f510b97 -->
## Remove the specified folder from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/folder/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`DELETE folder/{folder_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | int required The id of the folder.

<!-- END_7747f9c083bba73abb25f1929f510b97 -->

#User notes management


APIs for managing user notes
<!-- START_d2a6eae62224e78780ca1277a19e3790 -->
## Display a listing of the notes independent of authenticated user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Its sole purpose is to demonstrate the "Filtering" > "By note folder" implementation

> Example request:

```bash
curl -X GET \
    -G "http://localhost/notes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/notes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Invalid credentials."
}
```

### HTTP Request
`GET notes`


<!-- END_d2a6eae62224e78780ca1277a19e3790 -->

<!-- START_7075969943f9515bb304a6025fa06cde -->
## Display a listing of the notes for authenticated user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/saepe/note?sort=tempora&query=%22work%22&shared=1&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder/saepe/note"
);

let params = {
    "sort": "tempora",
    "query": ""work"",
    "shared": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Invalid credentials."
}
```

### HTTP Request
`GET folder/{folder_id}/note`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `sort` |  optional  | string Apply sorting using any of the following values: ['name_asc', 'name_desc', 'shared_first', 'shared_last'].
    `query` |  optional  | string Apply filter by note text content.
    `shared` |  optional  | boolean Apply filter by note visibility.
    `per_page` |  optional  | int Apply pagination limitation for number of displayed elements on one page.

<!-- END_7075969943f9515bb304a6025fa06cde -->

<!-- START_3137a21a7087e070262ea8546f0d5fd5 -->
## Store a newly created note in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/folder/dolorem/note" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolorum","is_public":true,"type":"est"}'

```

```javascript
const url = new URL(
    "http://localhost/folder/dolorem/note"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolorum",
    "is_public": true,
    "type": "est"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST folder/{folder_id}/note`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the note.
        `is_public` | boolean |  required  | The visibility status of the note.
        `type` | string |  required  | The type of the note, can be any of the following values: ['text', 'list']
    
<!-- END_3137a21a7087e070262ea8546f0d5fd5 -->

<!-- START_866a079cffb5719bed143f30b96291ad -->
## Display the specified note.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/et/note/necessitatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder/et/note/necessitatibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Invalid credentials."
}
```

### HTTP Request
`GET folder/{folder_id}/note/{note_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
    `note_id` |  required  | The id of the note.

<!-- END_866a079cffb5719bed143f30b96291ad -->

<!-- START_31572dc976a88f30688edd1c73164186 -->
## Update the specified note in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/folder/repellat/note/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ex","is_public":true}'

```

```javascript
const url = new URL(
    "http://localhost/folder/repellat/note/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ex",
    "is_public": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT folder/{folder_id}/note/{note_id}`

`PATCH folder/{folder_id}/note/{note_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
    `id` |  optional  | int required The id of the note.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the note.
        `is_public` | boolean |  required  | The visibility status of the note.
    
<!-- END_31572dc976a88f30688edd1c73164186 -->

<!-- START_78359ffc250f7049a9e1d1e3dc2cc823 -->
## Remove the specified note from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/folder/nostrum/note/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folder/nostrum/note/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE folder/{folder_id}/note/{note_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
    `note_id` |  required  | The id of the note.

<!-- END_78359ffc250f7049a9e1d1e3dc2cc823 -->

<!-- START_9f2a3dcacc7a92d6420deece964d915e -->
## Partially update the specified note in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/folder/praesentium/note/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"aut","is_public":true}'

```

```javascript
const url = new URL(
    "http://localhost/folder/praesentium/note/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "aut",
    "is_public": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT folder/{folder_id}/note/{note_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `folder_id` |  optional  | int required The id of the folder.
    `id` |  optional  | int required The id of the note.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the note.
        `is_public` | boolean |  required  | The visibility status of the note.
    
<!-- END_9f2a3dcacc7a92d6420deece964d915e -->


