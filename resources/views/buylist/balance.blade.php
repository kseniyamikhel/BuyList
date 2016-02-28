@extends ('layouts.app')
@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <form method="get" action="" >
                <div class="form-group form-inline">
                    <span>Choose month</span>
                    <div class="input-group">
                        <select name="month">
                            <option value="">All</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-xs">Save</button>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <td>{{ $list->category }}</td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->price }}</td>
                            <td>{{ $list->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <table class="table table-bordered">
                <thead>
                    <span>Expenses</span>
                </thead>
                <tbody>
                    @foreach($priceCategories as $priceCategory)
                        <tr>
                            <td>{{ $priceCategory->category }}</td>
                            <td>{{ $priceCategory->totalPrice }}</td>
                            <td>20%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@stop