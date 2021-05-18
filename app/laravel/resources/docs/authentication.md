# Authenticating requests

This API is authenticated by sending an **`Authorization`** header in the form **`"Basic {credentials}"`**. The value of `{credentials}` should be your username/id and your password, joined with a colon (:), and then base64-encoded.


