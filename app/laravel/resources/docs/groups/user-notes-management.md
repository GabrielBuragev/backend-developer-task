# User notes management

APIs for managing user notes

## Display a listing of the notes independent of authenticated user.

<small class="badge badge-darkred">requires authentication</small>

Its sole purpose is to demonstrate the "Filtering" > "By note folder" implementation

> Example request:

```bash
curl -X GET \
    -G "http://localhost/notes?folder_id=1&sort=name_asc&query=work&shared=1&per_page=10" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

> Example response (200):

```json
{
    "current_page": 1,
    "data": [
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
    ],
    "first_page_url": "http://localhost/notes?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost/notes?page=1",
    "next_page_url": null,
    "path": "http://localhost/notes",
    "per_page": "10",
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### Request

<small class="badge badge-green">GET</small>
**`notes`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Apply filter by folder id.

<code><b>sort</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply sorting using any of the following values: ['name_asc', 'name_desc', 'shared_first', 'shared_last'].

<code><b>query</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply filter by note text content.

<code><b>shared</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply filter by note visibility.

<code><b>per_page</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply pagination limitation for number of displayed elements on one page.

## Display a listing of the notes for authenticated user.

<small class="badge badge-darkred">requires authentication</small>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/1/note?sort=name_asc&query=work&shared=1&per_page=10" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 2,
            "name": "My note 2",
            "is_public": 1,
            "noteable_type": "list",
            "created_at": "2021-05-17 14:15:15",
            "updated_at": "2021-05-17 14:15:15",
            "laravel_through_key": 1,
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
    ],
    "first_page_url": "http://localhost/folder/1/note?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost/folder/1/note?page=1",
    "next_page_url": null,
    "path": "http://localhost/folder/1/note",
    "per_page": "10",
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### Request

<small class="badge badge-green">GET</small>
**`folder/{folder_id}/note`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>sort</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Apply sorting using any of the following values: ['name_asc', 'name_desc', 'shared_first', 'shared_last'].

<code><b>query</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply filter by note text content.

<code><b>shared</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply filter by note visibility.

<code><b>per_page</b></code>&nbsp; <small>string</small> <i>optional</i> <br>
Apply pagination limitation for number of displayed elements on one page.

## Store a newly created note in storage.

<small class="badge badge-darkred">requires authentication</small>

> Example request for `noteable_type:"list"`:

```bash
curl -X POST \
    "http://localhost/folder/1/note" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"A note","is_public":1,"noteable_type":"list","noteable":{"items":[{"content":"Item 1"}]}}'

```

> Example response for `noteable_type`:"list":

```json
{
    "id": 17,
    "name": "A note",
    "is_public": 1,
    "noteable_type": "list",
    "created_at": "2021-05-17 15:56:30",
    "updated_at": "2021-05-17 15:56:30",
    "noteable": {
        "id": 13,
        "created_at": "2021-05-17 15:56:30",
        "updated_at": "2021-05-17 15:56:30",
        "items": [
            {
                "id": 21,
                "content": "Item 1",
                "note_list_id": 13,
                "created_at": "2021-05-17 15:56:30",
                "updated_at": "2021-05-17 15:56:30"
            }
        ]
    }
}
```

> Example request for `noteable_type:"text"`:

```bash
curl -X POST \
    "http://localhost/folder/1/note" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"A note","is_public":1,"noteable_type":"text","noteable":{"content":"Cool note content"}}'
```

> Example response for `noteable_type`:"text":

```json
{
    "id": 20,
    "name": "A note",
    "is_public": 1,
    "noteable_type": "text",
    "created_at": "2021-05-17 16:01:16",
    "updated_at": "2021-05-17 16:01:16",
    "noteable": {
        "id": 7,
        "content": "Cool note content",
        "created_at": "2021-05-17 16:01:16",
        "updated_at": "2021-05-17 16:01:16"
    }
}
```

### Request

<small class="badge badge-black">POST</small>
**`folder/{folder_id}/note`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    The name of the note.

<code><b>is_public</b></code>&nbsp; <small>integer</small> <i>optional</i> <br>
The visibility status of the note, <b>default: false</b>.

<code><b>noteable_type</b></code>&nbsp; <small>string</small> <br>
The value must be one of <code>text</code> or <code>list</code>.

<code><b>noteable</b></code>&nbsp; <small>object</small> <br>
Object which holds note content data

### If `noteable_type` is set to `text` following rules apply

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>

<code><b>noteable.content</b></code>&nbsp; <small>string</small> <br>
Text content of the text note

### If `noteable_type` is set to `list` following rules apply

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>

<code><b>noteable.items[]</b></code>&nbsp; <small>array</small> <br>
Array of items for the list note

<code><b>noteable.items[].content</b></code>&nbsp; <small>string</small><br>
Text content of each list item

## Display the specified note.

<small class="badge badge-darkred">requires authentication</small>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/folder/1/note/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

> Example response (200):

```json
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
```

### Request

<small class="badge badge-green">GET</small>
**`folder/{folder_id}/note/{note_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<code><b>note_id</b></code>&nbsp; <small>string</small> <br>
The id of the note.

## Update the specified note in storage.

<small class="badge badge-darkred">requires authentication</small>

> Example request for `noteable_type:"list"`:

```bash
curl -X PUT \
    "http://localhost/folder/1/note/2" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":2,"name":"My note 2","is_public":0,"noteable_type":"list","noteable":{"id":1,"items":[{"id":1,"content":"Cool text work something food play"},{"id":2,"content":"work space food play wine status folks"},{"id":3,"content":"Cool note mine play wine status folks"}]}}'

```

> Example response for `noteable_type`:"list":

```json
{
    "id": 2,
    "name": "My note 2",
    "is_public": 0,
    "noteable_type": "list",
    "created_at": "2021-05-17 21:16:11",
    "updated_at": "2021-05-17 21:16:11",
    "noteable": {
        "id": 1,
        "created_at": "2021-05-17 21:16:11",
        "updated_at": "2021-05-17 21:16:11",
        "items": [
            {
                "id": 1,
                "content": "Cool text work something food play",
                "note_list_id": 1,
                "created_at": "2021-05-17 21:16:11",
                "updated_at": "2021-05-17 21:18:55"
            },
            {
                "id": 2,
                "content": "work space food play wine status folks",
                "note_list_id": 1,
                "created_at": "2021-05-17 21:16:11",
                "updated_at": "2021-05-17 21:16:11"
            },
            {
                "id": 3,
                "content": "Cool note mine play wine status folks",
                "note_list_id": 1,
                "created_at": "2021-05-17 21:16:11",
                "updated_at": "2021-05-17 21:16:11"
            }
        ]
    }
}
```

> Example request for `noteable_type:"text"`:

```bash
curl -X PUT \
    "http://localhost/folder/1/note/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":1,"name":"My note 1","is_public":0,"noteable_type":"text","noteable":{"id":1,"content":"text hobby play wine"}}'
```

> Example response for `noteable_type`:"text":

```json
{
    "id": 1,
    "name": "My note 1",
    "is_public": 0,
    "noteable_type": "text",
    "created_at": "2021-05-17 21:16:11",
    "updated_at": "2021-05-17 21:16:11",
    "noteable": {
        "id": 1,
        "content": "text hobby play wine",
        "created_at": "2021-05-17 21:16:11",
        "updated_at": "2021-05-17 21:16:11"
    }
}
```

### Request

<small class="badge badge-darkblue">PUT</small>
**`folder/{folder_id}/note/{note_id}`**

<small class="badge badge-purple">PATCH</small>
**`folder/{folder_id}/note/{note_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<code><b>id</b></code>&nbsp; <small>string</small> <br>
The id of the note.

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The name of the note.

<code><b>is_public</b></code>&nbsp; <small>integer</small> <i>optional</i> <br>
The visibility status of the note.

<code><b>noteable</b></code>&nbsp; <small>object</small> <br>
Object which holds note content data

### If `noteable_type` is set to `text` following rules apply

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>

<code><b>noteable.content</b></code>&nbsp; <small>string</small> <br>
Text content of the text note

### If `noteable_type` is set to `list` following rules apply

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>

<code><b>noteable.items[]</b></code>&nbsp; <small>array</small> <br>
Array of items for the list note

<code><b>noteable.items[].content</b></code>&nbsp; <small>string</small><br>
Text content of each list item

## Remove the specified note from storage.

<small class="badge badge-darkred">requires authentication</small>

> Example request:

```bash
curl -X DELETE \
    "http://localhost/folder/1/note/1" \
    -H "Authorization: Basic {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

> Example response:

```json
{
    "status": "success"
}
```

### Request

<small class="badge badge-red">DELETE</small>
**`folder/{folder_id}/note/{note_id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>folder_id</b></code>&nbsp; <small>string</small>     <br>
    The id of the folder.

<code><b>note_id</b></code>&nbsp; <small>string</small> <br>
The id of the note.
