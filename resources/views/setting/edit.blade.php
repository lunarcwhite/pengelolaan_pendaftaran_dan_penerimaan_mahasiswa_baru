<div class="modal fade" id="editSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">EDIT PENGUMUMAN</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{route('admin.setting.update')}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="issueinput6">Ubah Status</label>
                            <select id="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status" name="status">
                                @if ($setting->id == 1)
                                <option value="1" selected>DIBUKA</option> 
                                <option value="0">DITUTUP</option>    
                                @else
                                <option value="0" selected>DITUTUP</option> 
                                <option value="1">DIBUKA</option>   
                                @endif
                            </select>
                        </div>
                        <fieldset class="form-group">
                            <label for="basicInput">Tanggal Mulai Pengumuman</label>
                            <input type="date" class="form-control" id="date" name="date">
                            <input type="hidden" name="id" id="id">
                            <br>
                            <label for="basicInput">Jam Mulai Pengumuman</label>
                            <input type="time" class="form-control" id="time" name="time">
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

