<div>
    <div class="row mt-3">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Inbox</span>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped gy-7 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Url</th>
                                    <th>Pesan</th>
                                    <th>Status dibaca</th>
                                    <td>Dikirim</td>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inboxes as $in)
                                <tr>
                                    <td>{{$in->name}}</td>
                                    <td>{{$in->email}}</td>
                                    <td>{{Str::limit($in->url, '10', '...')}}</td>
                                    <td>{{Str::limit($in->pesan, 10, '...')}}</td>
                                    <td>
                                        @livewire('back.inbox-status', ['model' => $in, 'field' => 'isActive'],
                                        key($in->id))
                                    </td>
                                    <td>{{$in->created_at}}</td>
                                    <td>
                                        <div class="d-flex py-2 align-items-center">
                                            <a href="#" wire:click.prevent='deleteInbox({{$in->id}})'
                                                class="btn btn-sm btn-danger">Delete</a>
                                            <a data-bs-toggle="modal" data-bs-target="#view{{ $in->id }}"
                                                class="btn btn-primary btn-sm" style="margin-left: 3px">View</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6"><span class="text-danger">Inbox Not Found!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-4">
                            {{$inboxes->links('livewire::bootstrap')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @forelse ($inboxes as $in)
   <div class="modal modal-blur fade" id="view{{ $in->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inbox from: {{ $in->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-5">Name :</dt>
                        <dd class="col-7">{{ $in->name }}</dd>
                        <dt class="col-5">Email :</dt>
                        <dd class="col-7">{{ $in->email }}</dd>
                        <dt class="col-5">Url :</dt>
                        <dd class="col-7">@if ($in->url == null)
                            -
                            @else
                            {{ $in->url }}
                            @endif</dd>
                        <dt class="col-5">Pesan :</dt>
                        <dd class="col-7">{{ $in->pesan }}</dd>
                        <dt class="col-5">Tanggal :</dt>
                        <dd class="col-7">{{ $in->created_at }}</dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
   @empty

   @endforelse
</div>
