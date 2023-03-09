# Kendaraan

## Menambahkan data kendaraan baru

**URL** : `/v1/kendaraan/kendaraan/create`
**Method** : `POST`
**Auth required** : YES

**Data required**

```json
{
    "nopol"             : String,
    "nama_kendaraan"    : String,
    "tipe_kendaraan"    : String,
    "lokasi"            : String,
    "status"            : String, (Still not sure),
    "tgl_serah_terima"  : YYYY/MM/DD (Date db format)
}
```

## Success Response

**Condition** : If everything is OK and an Account didn't exist for this User.
**Code** : `201 CREATED`
**Content example**

```json
{
  "status": "success",
  "message": "Data kendaraan berhasil ditambahkan...",
  "data": true
}
```

## Error Responses

**Condition** : Validasi form gagal.
**Code** : `400 BAD REQUEST`
**Content** :

```json
}
  "status": false,
  "message": [
    "Nomor polisi wajib diisi.",
    "The Nama kendaraan field is required."
  ]
}
```

**Condition** : Database Failed
**Code** : `400 BAD REQUEST`
**Content example**

```json
{
  "status": false,
  "message": "Data kendaraan tidak berhasil ditambahkan
}
```

# Sopir

## Menambahkan data sopir baru
