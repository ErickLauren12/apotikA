<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Generic Name</th>
            <th scope="col">Form</th>
            <th scope="col">Formula</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
            <tr>
                <td>{{ $item['generic_name'] }}</td>
                <td>{{ $item['form'] }}</td>
                <td>{{ $item['restriction_formula'] }}</td>
                <td>{{ $item['price'] }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>