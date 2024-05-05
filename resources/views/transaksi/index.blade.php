@extends('templates.layout')
@push('style')
@endpush
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Menu</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="transaksi-container">
                            <ul class="item content menu-container">

                                @foreach($jenis as $j)
                                <li>
                                    <h3>{{ $j->nama_jenis}}</h3>
                                    <ul class="menu-item">
                                        @foreach($j->menu as $menu)
                                        <li data-harga="{{ $menu->harga}}" data-id="{{ $menu->id}}">
                                            <img class="img-fluid" style="max-width: 70px;" src="{{ asset('storage/menu-image/' .$menu->image)}}" alt="tidak ada gambar">
                                            {{ $menu->nama_menu}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            <div class="item sidebar">
                                <ul class="ordered-list"></ul>
                                <p>Total Bayar :
                                <h2 id="total"> 0 </h2>
                                </p>
                                <div>
                                    <button id="btn-bayar">Bayar</button>
                                </div>
                            </div>
                            <!-- <div class="item footer">Footer</div> -->
                        </div>

                        <style>
                                .ordered-item {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    background-color: lightcyan;
                                    border-radius: 5px;
                                    box-shadow: 0 2px 4px #ccc;
                                }
                                .ordered-item-container{
                                    display: flex;
                                    align-items: center;
                                }
                                .ordered-item-image{
                                    width: 50px;
                                    margin-right: 10px;
                                }
                                .ordered-item-details{
                                    flex: 1;
                                }
                                .ordered-item-name{
                                    margin: 0;
                                    font-size: 16px;
                                    font-weight: bold;
                                }
                                .ordered-item-price{
                                    margin: 5px 0;
                                    font-size: 14px;
                                    color: #666;
                                }
                                .ordered-item-actions{
                                    display: flex;
                                    align-items: center;
                                }
                                .qty-item{
                                    width: 40px;
                                    text-align: center;
                                    margin: 0 5px;
                                    border: 1px solid #ccc;
                                    border-radius: 3px;
                                }
                                .subtotal{
                                    margin: 0;
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                }
                                .remove-item,
                                .btn-dec, 
                                .btn-inc {
                                    background-color: lightcyan;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                }
                                .remove-item:hover,
                                .btn-dec:hover, 
                                .btn-inc:hover {
                                    background-color: #c82333;
                                }
                                .pagetitle{
                                    text-align: center;
                                    margin-bottom: 20px;
                                }
                                .pagetitle h1{
                                    font-size: 36px;
                                    color: #333;
                                    text-shadow: 2px 2px 2px black;
                                }
                                .menu-item li{
                                    cursor: pointer;
                                    text-align: left;
                                    font-size: 14px;
                                    font-weight: bold;
                                    color: #2a3f54;
                                    margin-bottom: 10px;
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                    transition: all 0.3s ease;
                                }
                                .menu-item li:hover{
                                    background-color: #f0f0f0;
                                }
                                .btn-dec,
                                .btn-inc{
                                    background-color: #333;
                                    font-weight: bold;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                    transition: all 0.3s ease;
                                }
                                .remove-item{
                                    background-color: red;
                                    font-weight: bold;
                                    color: #333;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 20px;
                                    transition: all 0.3s ease;
                                }
                                .btn-dec:hover,
                                .btn-inc:hover{
                                    background-color: #28a743;
                                }
                                .subtotal{
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                    margin-left: 10px;
                                }
                                .qty-item{
                                    width: 50px;
                                    text-align: center;
                                    margin: 0 5px;
                                }
                                #total{
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                    margin-top: 10px;
                                    margin-left: 16px;
                                }
                                .main{
                                    display: flex;
                                    gap: 2rem;
                                }
                                .c{
                                    width: 700px;
                                    display: flex;
                                    flex-direction: column;
                                }
                                .transaksi-container{
                                    border: 2px #fff;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px black;
                                    display: grid;
                                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                    gap: 30px;
                                    transition: box-shadow 0.3s;
                                }
                                .transaksi-container:hover{
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                                }
                                .item-content{
                                    width: 400px;
                                }
                                .menu-container{
                                    padding: 0px;
                                    list-style-type: none;
                                }
                                .menu-container li h3{
                                    text-transform: uppercase;
                                    font-weight: bold;
                                    font-size: 20px;
                                    background-color: #2a3f54;
                                    padding: 10px 20px;
                                    margin: 5px 0;
                                    border-radius: 5px;
                                    transition: background-color 0.3s;
                                }
                                .menu-container li h3:hover{
                                    background-color: lightblue;
                                }
                                .menu-item{
                                    list-style-type: none;
                                    display: flex;
                                    gap: 1rem;
                                }
                                .menu-item li{
                                    display: flex;
                                    flex-direction: column;
                                    padding: 10px 20px;
                                }
                                .item-content{
                                    text-align: center;
                                    margin-top: 72px;
                                }
                                .card{
                                    width: 400px;
                                    margin: auto;
                                    background-color: #f9f9f9;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    transition: box-shadow 0.3s;
                                }
                                .card:hover{
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                                }
                                .card-body{
                                    padding: 20px;
                                }
                                .card-title{
                                    font-size: 24px;
                                    color: #333;
                                    margin-bottom: 15px;
                                }
                                .ordered-list{
                                    list-style: none;
                                    font-size: 16px;
                                    padding: 0;
                                }
                                .card-text{
                                    font-size: 18px;
                                }
                                .btn-bayar{
                                    background-color: #007bff;
                                    color: #fff;
                                    border: none;
                                    border-radius: 5px;
                                    padding: 10px 20px;
                                    cursor: pointer;
                                    display: inline-block;
                                }
                                .btn-bayar:hover{
                                    background-color: #0056b3;
                                }

                                .item.sidebar {
                                    color: blue;
                                    width: 100%;
                                    display: flex;
                                    padding:1rem;
                                    flex-wrap: wrap;
                                    background-color: #ededed;
                                }
                                .item.sidebar ul {
                                    padding: o;
                                    list-style-type: none;
                                }
                                .menu-container {
                                padding: 0;
                                width: 70%;
                                display: flex;
                                flex-wrap: wrap;
                                list-style-type: none;


                                }
                                .menu-container li {
                                    margin-bottom: 20px;
                                }
                                .menu-container li h3 {
                                    text-transform: uppercase;
                                    font-weight: bold;
                                    font-size: 18px;
                                    background-color: aliceblue;
                                    padding: 5px 15px;
                                    /* margin-bottom: 10px */
                                }
                                .menu-item {
                                    list-style-type: none;
                                    display: flex;
                                    gap: 1em;
                                    margin: 10px 20px;
                                }
                                .menu-item li{
                                    background-color: beige;
                                    padding: 10px 20px;

                                }
                            </style>
                        @include('transaksi.data')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
            $('.alert-success').slideUp(500)
        })
    $(document).ready(function() {
        //your code here
    });

    $(function() {
        const orderedList = []
        let total = 0

        function sum() {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            }, 0)
        };

        const changeQty = (el, inc) => {
            const id = $(el).closest('li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.menu_id == id)
            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

            const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
            const txt_qty = $(el).closest('li').find('.qty-item')[0]
            txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

            $('#total').html(sum())
        }

        $('.ordered-list').on('click', '.btn-dec', function() {
            changeQty(this, -1)
        })
        $('.ordered-list').on('click', '.btn-inc', function() {
            changeQty(this, 1)
        })

        $('.ordered-list').on('click', '.remove-item', function() {
            const item = $(this).closest('li')[0];
            let index = orderedList.findIndex(list => list.menu_id == parseInt(item.dataset.id))
            orderedList.splice(index, 1)
            $(item).remove();
            $('#total').html(sum())
        })

        $('#btn-bayar').on('click', function() {
            $.ajax({
                url: "{{ route('transaksi.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    orderedList: orderedList,
                    total: sum()
                },
                success: function(data) {
                    console.log(data),
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: "Cetak Nota",
                            denyButtonText: 'ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota')}}/" + data.nota)
                                location.reload()
                            } else if (result.isDenied) {
                                location.reload()
                            }

                        });
                },
                error: function(request, status, error) {
                    console.log(request,status, error)
                    Swal.fire('Pemesanan Gagal!')
                }
            })
        })

        // $(".menu-item li").click(function() {
        //     const menu_cliked = $(this).text();
        //     const data = $(this)[0].dataset;
        //     const harga = data.harga;
        //     const id = data.id;

        //     if (orderedList.length != 0 && orderedList.some(list => list.id === id)) {
        //         let index = orderedList.findIndex(list => list.id === id)
        //         orderedList[index].qty.qty += 1
        //     } else {
        //         let dataN = {
        //             'id': id,
        //             'menu': menu_cliked,
        //             'harga': harga,
        //             'qty': 1
        //         }
        //         orderedList.push(dataN);
        //     }
        //     $('.ordered-list').remove()
        //     orderedList.forEach(function() {
        //         $('.ordered-list').append('<li>' + data.menu + 'Rp. ' + data.harga + 'x ' + data.qty + '= ' + data.harga * data.qty + '</li>')
        //     })
        // });

        $(".menu-item li").click(function() {
            const menu_clicked = $(this).text()
            const data = $(this)[0].dataset
            const harga = parseFloat(data.harga)
            const id = parseInt(data.id)

            if (orderedList.every(list => list.menu_id !== id)) {
                let dataN = {
                    'menu_id': id,
                    "menu": menu_clicked,
                    'harga': harga,
                    "qty": 1
                }
                orderedList.push(dataN)
                let listOrder = `<li data-id="${id}"> <h3>${menu_clicked}</h3><h4>Rp.${harga}<h4>`
                listOrder += `<button class="btn-dec"> - </button>`
                listOrder += `<input class="qty-item" type="number" value="1" style="3rem" readonly/>
                <button class="btn-inc">+</button><br>
                <button class="remove-item">Hapus</button>
                <span class="subtotal">${harga * 1}</span>
                </li>`
                $(".ordered-list").append(listOrder)
            }
            $("#total").html(sum())
        })
    });
</script>
@endpush



