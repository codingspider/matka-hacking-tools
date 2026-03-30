@extends('layouts')
@section('title', 'Matka play history')
@section('content')
<h2 class="mb-4">Play List</h2>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Game Time</th>
                    <th>Number</th>
                    <th>Point</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plays as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->matkaCategory?->name }}</td>
                    <td>
                        {{ $item->gameTime?->bazar?->name ?? 'N/A' }} 
                        {{ $item->gameTime?->status == 0 ? 'open' : 'close' }}
                    </td>
                    <td>
                        <input type="text" 
                        value="{{ $item->number }}" 
                        class="form-control played-number" 
                        data-id="{{ $item->id }}" 
                        data-original="{{ $item->number }}">
                    </td>
                    <td>{{ $item->point }}</td>
                    <td>{{ $item->status == 0 ? 'active' : '' }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.played-number').on('blur', function() {
        var playId = $(this).data('id');
        var newNumber = $(this).val();
        var originalNumber = $(this).data('original');

        // Only send AJAX if the value changed
        if (newNumber === originalNumber) return;

        // Update data-original to new value after successful change
        var inputField = $(this);

        $.ajax({
            url: "{{ route('plays.updateNumber') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: playId,
                number: newNumber
            },
            success: function(response) {
                alert('Number updated successfully!');
                // Update original number so next blur won't send unnecessary request
                inputField.data('original', newNumber);
            },
            error: function(xhr) {
                alert('Update failed: ' + xhr.responseText);
                // Reset input to original number if failed
                inputField.val(originalNumber);
            }
        });
    });
});
</script>
@endsection