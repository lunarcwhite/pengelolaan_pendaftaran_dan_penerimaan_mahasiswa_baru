<div class="modal fade" id="editWaktu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">EDIT PENGUMUMAN</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{route('waktu_ujian')}}" method="POST">
                        @csrf
                        @method('patch')
                        <fieldset class="form-group">
                            <label for="basicInput">Waktu Ujian</label>
                            <input type="number" class="form-control" id="waktu" name="waktu" width="60px">
                            <p class="text-small">Isikan dengan jumlah Menit</p>
                            <input type="hidden" name="id" id="idwaktu">
                        </fieldset>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Close</span>
                        </button>
                        <button type="submit" class="btn btn-success"> simpan</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
</div>