<!-- CSS Ticket inspired by -->
<!-- https://dribbble.com/shots/2677752-Dribbble-invite-competition -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<link rel="stylesheet" href="style/ticket.less">

@foreach ($reservations as $re)
    <input type="hidden" value="{{ $re->client->user->id }}">
    <div class="ticket">
        <div class="stub">
            <div class="top">
                <span class="admit"></span>
                <span class="line"></span>
                <span class="num">
                    Invitation
                    <span>31415926</span>
                </span>
            </div>
            <div class="number">1</div>
            <div class="invite">
                Invite for you
            </div>
        </div>
        <div class="check">
            <div class="big ">

            </div>
            <div class="number">#1</div>
            <div class="info">
                <section>
                    <div class="title">Date</div>
                    <div>02/05/2024</div>
                </section>
                <section>
                    <div class="title">Ctaegorie</div>
                    <div>test</div>
                </section>
                <section>
                    <div class="title">Organizer Name</div>
                    <div>Organizer</div>
                </section>
            </div>
        </div>
    </div>
@endforeach
