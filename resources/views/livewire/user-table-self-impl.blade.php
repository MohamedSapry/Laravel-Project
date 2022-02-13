<div>
    <div class="sidenav">
        <a href="http://localhost:8001/api/addresses">Users Table</a><br></br>
        <a href="http://localhost:8001/api/newAddress">New Address</a><br></br>
    </div>

<table class="center">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Street Name</th>
                <th>Building Number</th>
                <th>Floor</th>
                <th>Apartment Number</th>
                <th>Area Name</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->name }}</td>
                    <td>{{ $address->street_name }}</td>
                    <td>{{ $address->building_number }}</td>
                    <td>{{ $address->floor }}</td>
                    <td>{{ $address->number_of_apartment }}</td>
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->city }}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="center">
        @if ($addresses->hasPages())
                <span>
                    @if ($addresses->onFirstPage())
                        <a href= "#" class="button"> << </a>
                    @else
                        <a href= {{ $addresses->previousPageUrl() }} class="button"> << </a>
                    @endif
                </span>

                <span>
                        <a href = "#" class="button"> {{ $addresses->currentPage() }} </a>
                </span>

                <span>
                    @if ($addresses->hasMorePages())
                        <a href = {{ $addresses->nextPageUrl() }} class="button"> >> </a>
                    @else
                        <a href = "#" class="button"> >> </a>
                    @endif
                </span>
        @endif
    </div>
</div>  



        

