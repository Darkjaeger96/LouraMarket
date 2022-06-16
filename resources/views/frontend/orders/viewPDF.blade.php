
<style>
    th, td {
      border: solid 1px #777;
      padding: 2px;
      margin: 2px;
    }
</style>

<div class="card-body">
    <div class="row">
        <div class="col-md-6 orderDetails">
            <h4>Detalles del Envío</h4>
            <hr>
            <b>Nombre:</b> {{ $orders->fname }} <br>
            <b>Apellidos:</b> {{ $orders->lname }} <br>
            <b>Email:</b> {{ $orders->email }} <br>
            <b>Teléfono:</b> {{ $orders->phone }} <br>
            <b>Dirección de Envío:</b> <br>
                {{ $orders->address }}, <br>
                {{ $orders->country }}, <br>
                {{ $orders->state }},
                {{ $orders->city }} <br>

            <b>Código Postal:</b> <br>
            {{ $orders->pincode }} <br>




        <div class="col-md-6">
            <h4>Detalles del Pedido</h4>
            <hr>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($orders->orderItems as $item)
                        <tr>
                            <td>{{ $item->products->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}€</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="px-2">Total Final: <span class="float-end">{{ $orders->total_price }}€</span> </h4>
        </div>
    </div>
</div>