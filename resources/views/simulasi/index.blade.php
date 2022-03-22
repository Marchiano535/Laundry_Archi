@extends('template.header')

@section('content')
    {{-- Content header --}}
<section class="content-header">
    <div class="container-fluid"></div>
</section>
{{-- Main content --}}
<section  class="content">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataSimulasi" role="button" aria-expanded="false" aria-controls="collapseExample">Data</a>
  </li>
  </ul>
  <div class="card" style="border-top:0px">
    {{-- <form id="forem" action="simulasi"> --}}
    @include('simulasi.form')
    @include('simulasi.data')

      <input type="hidden" name="id_gaji" id="id_gaji">
    {{-- </form> --}}
  </div>
</section>
@endsection
@push('script')
    <script>
      console.log('javascript')
        // methods
        function insert() {
            const form = $('#formGajiKaryawan').serializeArray()
            let dataGajiKaryawan = JSON.parse(localStorage.getItem('dataGajiKaryawan')) || []
            let newData = {}
            form.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id_karyawan' ?
                    Number(item['value']) : item['value'])
                newData[name] = value
            })
            console.log(newData)
            localStorage.setItem('dataGajiKaryawan', JSON.stringify([...dataGajiKaryawan, newData]))
            return newData
        }

        // After Load / Function untuk mengatur button / ngetrigger
        $(function() {
            // Initialize
            let dataGajiKaryawan = JSON.parse(localStorage.getItem('dataGajiKaryawan')) || []
            $('#tblGajiKaryawan tbody').html(showData(dataGajiKaryawan))

            // Events
            $('#formGajiKaryawan').on('submit', function(e) {
              e.preventDefault()
              // alert('submit');
                dataGajiKaryawan.push(insert())
                console.log(dataGajiKaryawan)
                $('#tblGajiKaryawan tbody').html(showData(dataGajiKaryawan))
            })

            // Button Searching
            $('#btnSearch').on('click', function(e) {
                let teksSearch = $('#search').val()
                let id = searching(dataGajiKaryawan, 'nama_karyawan', teksSearch)
                let data = []
                if (id >= 0)
                    data.push(dataGajiKaryawan[id])
                console.log(id)
                console.log(data)
                $('#tblGajiKaryawan tbody').html(showData(data))
            })
            // End Events Button Searching

            // Event Ngetrigger Button Sorting 
            // Desceding (Big to Small)
            $('#sorting').on('click', function() {
                dataGajiKaryawan = insertionSort(dataGajiKaryawan, 'id_karyawan')

                $('#tblGajiKaryawan tbody').html(showData(dataGajiKaryawan))
                console.log(dataGajiKaryawan)
            })

            // Asceding (Small to Big)
            $('#sorting2').on('click', function() {
                dataGajiKaryawan = insertionSort2(dataGajiKaryawan, 'id_karyawan')

                $('#tblGajiKaryawan tbody').html(showData(dataGajiKaryawan))
                console.log(dataGajiKaryawan)
            })

            // Status Trigger
            $('#status').on('change', function() {
                let value = $('#status').val()
                console.log(value)
                if (value == 'single') {
                    $('#qty').val(0)
                    $('#qty').attr('readonly', true)
                } else {
                    $('#qty').attr('readonly', false)

                }
            })
            // End Event
        })

        // Tampilkan Data
        function showData(dataGajiKaryawan) {
            var fullawal = 0
            var fulltunjangan = 0
            var fulltotal = 0
            let total = 0
            let status = 0
            let tunjangan = 0
            let awal = 2000000
            let row = ''
            // let arr = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            if (dataGajiKaryawan.length == 0) {
                return row = `<tr><td colspan ="9" align="center">Belum ada data</td></tr>`
            }

            dataGajiKaryawan.forEach(function(item, index, set) {
                set = new Date(item['tgl'])
                var ageDifMs = Date.now() - set.getTime();
                if (ageDifMs > 0) {
                    var ageDate = new Date(ageDifMs)
                    var newAge = Math.abs(ageDate.getUTCFullYear() - 1970)
                    var tahun = newAge * 150000
                } else {
                    var tahun = 0
                }

                if (item['qty'] >= 2) {
                    var child = 2
                } else if (item['qty'] != 1) {
                    var child = 0
                } else {
                    var child = 1
                }

                let qty = 150000 * child
                status = (item['status'] === 'couple' ? 250000 : 0)
                tunjangan = qty + status + tahun
                total = tunjangan + awal


                row += '<tr>'
                row += `<td>${item['id_karyawan']}</td>`
                row += `<td>${item['nama_karyawan']}</td>`
                row += `<td>${item['jk']}</td>`
                row += `<td>${item['status']}</td>`
                row += `<td>${item['qty']}</td>`
                row += `<td>${item['tgl']}</td>`
                row += `<td>${awal}</td>`
                row += `<td>${tunjangan}</td>`
                row += `<td>${total}</td>`
                row += '</tr>'

                fullawal += awal
                fulltunjangan += tunjangan
                fulltotal += total
                console.log(fullawal + ' + ' + awal)

            })

            row += '<tr>'
            row += `<td width="" colspan="6" align="center"
                    style="background:black;color:white;font-weight:bold;font-size:1em">TOTAL</td>`
            row += `<td style="background:#CEC8CB">${fullawal}</td>`
            row += `<td style="background:#e4d9d9">${fulltunjangan}</td>`
            row += `<td style="background:#CEC8CB">${fulltotal}</td>`
            row += '</tr>'

            return row
        }

        // Insert Sorting (Besar ke kecil)
        function insertionSort(arr, key, type) {
            let i, j, id, value;
            type = type === 'asc' ? '>' : '<'

            if (arr[0].constructor !== Object || !key) return false
            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;

                while (j >= 0 && eval(arr[j][key] + type + id)) {
                    arr[j + 1] = arr[j]; // data ke-2 = data ke-1
                    j--; // -1
                }
                arr[j + 1] = value; // data ke-1 = data ke-2
            }
            return arr
        }

        // InsertionSort2 (Small to Big)
        function insertionSort2(arr, key) {
            let i, j, id, value; // Penjelasan :
            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && arr[j][key] > id) {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }
            return arr
        }

        // searching
        function searching(arr, key, teks) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == teks)
                    return i
            }
            return -1
        }
    </script>
@endpush