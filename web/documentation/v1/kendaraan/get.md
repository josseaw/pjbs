# Kendaraan

## Mendapatkan semua data kendaraan

**URL** : `/v1/kendaraan/kendaraan/`
**Method** : `GET`
**Auth required** : YES

## Mendapatkan semua data kendaraan berdasarkan ID

**URL** : `/v1/kendaraan/kendaraan?id={kendaraan_id}`
**Method** : `GET`
**Auth required** : YES

## Mendapatkan semua data kendaraan berdasarkan query pencarian

**URL** : `/v1/kendaraan/kendaraan?cari={query}`
**Method** : `GET`
**Auth required** : YES

## Mendapatkan semua data kendaraan berdasarkan filter Ketersediaan

**URL** : `/v1/kendaraan/kendaraan?tersedia={true/false}`
**Method** : `GET`
**Auth required** : YES

### Success Response

**Code** : `200 OK`
**Content examples**

```json
{
  "status": "success",
  "message": "Data kendaraan tersedia",
  "data": [
    {
      "id": "1",
      "nopol": "AE887BH",
      "nama": "ApansaAHh",
      "tipe": "Operasional",
      "lokasi": "Kantor Pusat",
      "status": "Nonaktif",
      "tgl_serahterima": "2010-03-29",
      "terpakai": "0",
      "created_at": "2020-10-11 15:33:38",
      "last_update_at": "2020-10-14 00:18:54"
    }
  ]
}
```

### Error Response

**Condition** : Data tidak tersedia di database.
**Code** : `404 NOT FOUND`
**Content example** :

```json
{
  "status": false,
  "message": "Tidak ada data kendaraan yang ditemukan..."
}
```

**Condition** : ID tidak valid (kurang dari 0).
**Code** : `400 BAD REQUEST`
**Content example** :

```
null
```

# Sopir
