@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Support Ticket'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{asset('/public/assets/back-end/img/support_ticket.png')}}" alt="">
                {{\App\CPU\translate('support_ticket')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-header flex-wrap gap-3" id="chat-room">
            @foreach($supportTicket as $ticket )
                <?php
                $userDetails = \App\User::where('id', $ticket['customer_id'])->first();
                $conversations = \App\Model\SupportTicketConv::where('support_ticket_id', $ticket['id'])->get();
                $admin = \App\Model\Admin::get();
                ?>
                <div class="media d-flex gap-3">
                    <img class="rounded-circle avatar" src="{{asset('storage/app/public/profile')}}/{{isset($userDetails)?$userDetails['image']:''}}"
                            onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}"
                            alt="{{isset($userDetails)?$userDetails['name']:'not found'}}"/>
                    <div class="media-body">
                        <h6 class="font-size-md mb-1">{{isset($userDetails)?$userDetails['f_name'].' '.$userDetails['l_name']:'not found'}}</h6>
                        <div class="fz-12">{{isset($userDetails)?$userDetails['phone']:''}}</div>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <div class="type font-weight-bold bg-soft--primary c1 px-2 rounded">{{\App\CPU\translate(str_replace('_',' ',$ticket['type']))}}</div>
                    <div class="priority d-flex flex-wrap align-items-center gap-3">
                        <span class="title-color">{{\App\CPU\translate('Priority')}}:</span>
                        <span class="font-weight-bold badge-soft-info rounded px-2">{{\App\CPU\translate(str_replace('_',' ',$ticket['priority']))}}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <p class="font-size-md message-box message-box_incoming mb-1">{{$ticket['description']}}</p>
                    <span class="fz-12 text-muted d-flex">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')}}</span>
                </div>
                <div id="conversation">
                    @foreach($conversations as $conversation)
                        @if($conversation['admin_message'] ==null )
                            <div class="mb-4">
                                <p class="font-size-md message-box message-box_incoming mb-1">{{$conversation['customer_message']}}</p>
                                <span class="fz-12 text-muted d-flex">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['created_at'])->format('Y-m-d h:i A')}}</span>
                            </div>
                        @endif
                        @if($conversation['customer_message'] ==null)
                            <div class="mb-4 d-flex flex-column align-items-end">
                                <div>
                                    <p class="font-size-md message-box mb-1">{{$conversation['admin_message']}}</p>
                                    <span class="fz-12 text-muted d-flex"> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['updated_at'])->format('Y-m-d h:i A')}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                @endforeach
                <!-- Leave message-->
                <h5 class="pt-4 pb-1 d-flex">{{\App\CPU\translate('Leave_a_Message')}}</h5>
                {{-- @foreach($supportTicket as $reply) --}}
                    <form class="needs-validation">
                        @csrf
                        <input type="hidden" id="id" value="{{ request()->id }}">
                        <input type="hidden" id="adminId" value="1">
                        <div class="form-group">
                        <textarea class="form-control" id="replay" rows="8" placeholder="{{\App\CPU\translate('Write_your_message_here')}}..."
                                required></textarea>
                            <div class="text-danger" style="display: none" id="message-error"> {{\App\CPU\translate('Please write the message')}}!</div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox d-block">
                            </div>
                            <button class="btn btn--primary px-4" id="support-btn">{{\App\CPU\translate('Reply')}}</button>
                        </div>
                    </form>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/assets/back-end')}}/js/demo/datatables-demo.js"></script>
    <script src="{{asset('public/assets/back-end/js/croppie.js')}}"></script>

    <script>
        $("#support-btn").click(function (e) { 
            e.preventDefault();
            var id = $("#id").val();
            var adminId = $("#adminId").val();
            var replay = $("#replay").val();
            if(replay != ''){
                $("#message-error").hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.support-ticket.replay', request()->id) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id,
                        adminId:adminId,
                        replay:replay,
                    },
                    success: function (response) {
                        $("#chat-room").stop().animate({scrollTop: $('#chat-room').prop("scrollHeight")}, 1000);
                        $("#replay").val("");
                        $("#conversation").append(`
                            <div class="mb-4 d-flex flex-column align-items-end">
                                <div>
                                    <p class="font-size-md message-box mb-1">${replay}</p>
                                    <span class="fz-12 text-muted d-flex"> {{ now()->format('Y-m-d h:i A') }}</span>
                                </div>
                            </div>
                        `);
                    }
                });
            } else{
                $("#message-error").show();
            }
        });
    </script>
    
@endpush
