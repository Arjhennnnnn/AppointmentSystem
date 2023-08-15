<x-layout>
    <div class="row mt-5 ">
        <h3 class="text-center fw-bold text-success">Appointment Details</h3>

        <div class="col-8 offset-2">
            <form action="/appointment/update/{{$appointment->id}}" class="row" method="post">
            @csrf
            @method('PUT')
                <div class="col-6 my-1">
                    <input type="text" class="form-control mt-2" name="name" placeholder="Fullname" value="{{ $appointment->name }}">
                </div>
                <div class="col-6 my-1">
                    <select class="form-select mt-2" id="floatingSelect" name="appointment_detail" >
                        <option value="{{ $appointment->appointment_detail }}">{{ $appointment->appointment_detail }}</option>
                        <option value="general">General Health</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="dental">Dental</option>
                        <option value="neurology">Neurology</option>
                        <option value="orthopaedics">Orthopaedics</option>
                    </select>
                </div>
                <div class="col-6 my-1">
                    <input type="text" class="form-control mt-2" name="appointment_start" value="{{ $appointment->appointment_start }}">
                </div>
                <div class="col-6 my-1">
                    <input type="text" class="form-control mt-2" name="appointment_end" value="{{ $appointment->appointment_end }}">
                </div>
                <div class="col-6 my-1">
                    <input type="number" class="form-control mt-2" name="phone" placeholder="Phone" value="{{ $appointment->phone }}">
                </div>
                <div class="col-6 my-1">
                    <input type="text" class="form-control mt-2" name="message" placeholder="Message" value="{{ $appointment->message }}">
                </div>
                <div class="col-6 my-1">
                    <input type="text" class="form-control mt-2" name="message" placeholder="Message" disabled value="Status : {{ $appointment->stats->name }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-3 w-100">Update Appointment</button>
                </div>
            </form>

            <div class="col-12">
                <form action="/appointment/cancel/{{$appointment->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger mt-3 w-100">Cancel Appointment</button>
                </form>
            </div>

            <div class="col-12">
                <a href="/appointment/show"><button class="btn btn-primary mt-3 w-100">Back</button></a>
            </div>
        </div>
    </div>
</x-layout> 
