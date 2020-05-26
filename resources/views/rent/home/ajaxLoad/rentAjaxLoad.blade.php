<div class="table-responsive">
    <table class="table zero-configuration">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Month</th>
                <th>Apertment</th>
                <th>Original <br> Rent</th>
                <th>Collected <br> Rent</th>
                <th>Due</th>
                <th>Expense</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$rent->date}}</td>
                <td>{{$rent->month}}</td>
                <td>{{$rent->apertment->name}}</td>
                <td>{{$rent->original_rent}}</td>
                <td>{{$rent->rent}}</td>
                <td>{{$rent->due}}</td>
                <td>{{$rent->expense}}</td>
                <td></td>
            </tr>
            @endforeach



        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Month</th>
                <th>Apertment</th>
                <th>Original <br> Rent</th>
                <th>Collected <br> Rent</th>
                <th>Due</th>
                <th>Expense</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    $(document).ready(function () {
        $(".zero-configuration").DataTable();
    });

</script>
