      <!-- edit_modal_attendance -->
      <div class="modal fade" id="edit{{ $attendance->id }}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                          Edit Attendance For Student : <span class="text-success"> {{ $attendance->student->name }}
                          </span>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- add_form -->
                      <form action="{{ route('attendance.update', $attendance->id) }}" method="post">
                          @csrf

                          <div class="row m-2">
                              <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendence" value="presence"
                                       {{ $attendance->status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">presence</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendence" value="absence"
                                       {{ $attendance->status == 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absence">
                                <span class="text-danger">absence</span>
                            </label>
                          </div>
                          

                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">submit</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
