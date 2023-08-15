<x-layout>
    <x-navbar/>
    <div class="row mt-5">
        <h3 class="text-center fw-bold py-2">Appointment List</h3>
        <div class="col-8 offset-2">
            <table class="table table-striped">
                <tr class="table-success">
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Appointment Start</th>
                    <th>Appointment End</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->name}}</td>
                        <td>{{$appointment->appointment_detail}}</td>
                        <td>{{$appointment->appointment_start}}</td>
                        <td>{{$appointment->appointment_end}}</td>
                        <td>{{$appointment->stats->name}}</td>
                        <td>
                            <input type="submit" class="btn btn-primary w-100" value="View">
                        </td>
                    </tr>
                    @endforeach
          </table>
        </div>
    </div>
</x-layout>