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
    <h1>Show ALL Category data</h1><br>
    <h1>1) With Eloquent</h1>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($catE as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>

      <h1>2) With Query Builder</h1>
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($catD as $item)
              <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->description }}</td>
                  <td>
                </td>
                </tr>
              @endforeach
          </tbody>
        </table>

        <h1>Show ALL Medicines data</h1><br>
        <h1>1) With Eloquent</h1>
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Generic Name</th>
              <th scope="col">Formula</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($medE as $item)
              <tr>
                  <td>{{ $item->generic_name }}</td>
                  <td>{{ $item->form }}</td>
                  <td>{{ $item->price }}</td>
                </tr>
              @endforeach
          </tbody>
        </table>

        <h1>2) With DB Query</h1>
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Generic Name</th>
              <th scope="col">Formula</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($medD as $item)
              <tr>
                  <td>{{ $item->generic_name }}</td>
                  <td>{{ $item->form }}</td>
                  <td>{{ $item->price }}</td>
                </tr>
              @endforeach
          </tbody>
        </table>

        <h1>Inner Join 2 table</h1><br>
        <h1>1) With Eloquent</h1>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Generic Name</th>
                <th scope="col">Formula</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($joinE as $item)
                <tr>
                    <td>{{ $item->generic_name }}</td>
                    <td>{{ $item->form }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>

          <h1>2) With DB Query</h1>
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Generic Name</th>
                  <th scope="col">Formula</th>
                  <th scope="col">Price</th>
                  <th scope="col">Category</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($joinE as $item)
                  <tr>
                      <td>{{ $item->generic_name }}</td>
                      <td>{{ $item->form }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->category->name }}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table><br>

        <h1>Display Number of data that have data on categories</h1><br>
        <h1>1) With Eloquent</h1>
        <p>{{ $hasDataE }}</p>
        <h1>2) With DB Query</h1>
        <p>{{ $hasDataD }}</p>

        <h1>Display Number of data that have doesnt have data on categories</h1><br>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Name</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($doesntHasDataE as $item)
              <tr>
                  <td>{{ $item->name }}</td>
                </tr>
              @endforeach
          </tbody>
        </table><br>

        <h1>3) find AVG</h1>
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Average</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($avgE as $item)
                  <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->avg }}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table><br>

            <h1>4) Show Drug category that have 1 medicine product</h1>
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($oneE as $item)
                  <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->description }}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table><br>

            <h1>5) Show Drug that have one form</h1>
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Form</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Restriction Formula</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($singleD as $item)
                    <tr>
                      <td>{{ $item->generic_name }}</td>
                      <td>{{ $item->form }}</td>
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->restriction_formula }}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table><br>

              <h1>6) Display the category and name of the drug that has the highest price</h1>
              <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Category Name</th>
                      <th scope="col">Drug Name</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($maxD as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->generic_name }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table><br>
</body>
</html>