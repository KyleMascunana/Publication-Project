<x-chief-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                                <form action="{{ route('chief.mail.send') }}" method="POST">
                                    @csrf


                                    <div class="card text-center">
                                        <div class="card-header">
                                            <p class="flex text-lg text-gray-500 pb-3">Invite a Reviewer</p><hr><br>

                                            <div class="text-gray-500 text-xs">
                                                <div>
                                                      <div class="row g-2">
                                                        <div class="col-md-6">
                                                          <div class="form-floating">
                                                            <input type="text" name="name" class="form-control rounded border-gray-200 text-gray-500" id="floatingInputGrid"
                                                            placeholder="">
                                                            <label for="floatingInputGrid">Name</label>
                                                            @error('name')
                                                                <span class="text-red-500"> {{ $message }}</span>
                                                            @enderror
                                                          </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="email" name="email" class="form-control rounded border-gray-200 text-gray-500" id="floatingInputGrid"
                                                                placeholder="name@example.com">
                                                                <label for="floatingInputGrid">Email address</label>
                                                                @error('email')
                                                                <span class="text-red-500"> {{ $message }}</span>
                                                            @enderror
                                                              </div>
                                                        </div>

                                                        <div class="col-md-7">
                                                            <div class="form-floating">
                                                                <input type="text" name="subject" class="form-control rounded border-gray-200 text-gray-500" id="floatingInputGrid"
                                                                placeholder="">
                                                                <label for="floatingInputGrid">Subject</label>
                                                                @error('subject')
                                                                <span class="text-red-500"> {{ $message }}</span>
                                                            @enderror
                                                              </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" name="message" placeholder="Leave a comment here"
                                                                id="floatingTextarea2" style="height: 100px"></textarea>
                                                                <label for="floatingTextarea2">Message</label>
                                                                @error('message')
                                                                <span class="text-red-500"> {{ $message }}</span>
                                                            @enderror
                                                              </div>
                                                        </div>
                                                      </div>
                                               </div>

                                            </div>
                                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                                    <a href="{{ route('chief.reviewers.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                                                    text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                                                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
                                                  </div>
                                        </div>
                                      </div>

                                </form>
                                    <br><br>
            </div>
        </div>
    </div>


</x-chief-layout>


