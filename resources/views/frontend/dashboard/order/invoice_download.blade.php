<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Factura</title>
    <style>
      * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 13px;
        line-height: 1.5;
      }

      h1, h2, h3, h4 {
        color: #2E7D32;
        margin: 0;
      }

      .container {
        padding: 20px;
      }

      .header, .info, .summary {
        background-color: #F0F0F0;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
      }

      .header h2 {
        font-size: 24px;
      }

      .info p, .summary p {
        margin: 4px 0;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
      }

      thead {
        background-color: #2E7D32;
        color: white;
      }

      th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
      }

      .total {
        text-align: right;
        margin-top: 10px;
      }

      .thanks {
        margin-top: 20px;
        font-style: italic;
        color: #2E7D32;
      }

      .signature {
        float: right;
        text-align: center;
        margin-top: 50px;
      }

      .signature-line {
        margin-top: 40px;
        border-top: 1px solid #999;
        width: 200px;
      }
    </style>
  </head>
  <body>

    <div class="container">

      <div class="header">
        <table width="100%">
          <tr>
            <td>
              <h2>EasyShop</h2>
            </td>
            <td align="right">
              <p><strong>Oficina Central</strong><br>
              Email: soporte@easyshop.com<br>
              Tel: 1245454545<br>
              Dirección: Dhanmondi #4, Dhaka 1207</p>
            </td>
          </tr>
        </table>
      </div>

      <div class="info">
        <table width="100%">
          <tr>
            <td width="60%">
              <p><strong>Cliente:</strong> {{ $order->name }}</p>
              <p><strong>Correo:</strong> {{ $order->email }}</p>
              <p><strong>Teléfono:</strong> {{ $order->phone }}</p>
              <p><strong>Dirección:</strong> {{ $order->address }}</p>
            </td>
            <td>
              <h3>Factura #{{ $order->invoice_no }}</h3>
              <p><strong>Fecha:</strong> {{ $order->order_date }}</p>
              <p><strong>Método de Pago:</strong> {{ $order->payment_method }}</p>
            </td>
          </tr>
        </table>
      </div>

      <h3>Detalle de Productos</h3>

      <table>
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Código</th>
            <th>Cantidad</th>
            <th>Restaurante</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orderItem as $item)
          <tr>
            <td><img src="{{ public_path($item->product->image) }}" width="60" height="60" alt=""></td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->product->code }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->product->client->name }}</td>
            <td>${{ number_format($item->price * $item->qty, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="total">
        <h3>Subtotal: ${{ number_format($totalPrice, 2) }}</h3>
        <h3>Total: ${{ number_format($totalPrice, 2) }}</h3>
      </div>

      <div class="thanks">
        <p>¡Gracias por su compra! Esperamos verlo nuevamente.</p>
      </div>

      <div class="signature">
        <div class="signature-line"></div>
        <p>Firma de la autoridad</p>
      </div>

    </div>

  </body>
</html>
