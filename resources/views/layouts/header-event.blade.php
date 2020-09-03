<nav class="nav-tabbar bg-white shadow-sm mb-3">
                <ul class="nav flex-row flex-nowrap nav-fill">
                    <li class="nav-item" id="basic"><a href="{{ route('event.event_post') }}" class="nav-link py-4 border-right"><span class="badge badge-circle">1</span> BASIC</a></li>
                    <li class="nav-item" id="when"><a href="{{ route('event.event_post_when_where') }}" class="nav-link py-4 border-right" id="when_a" disabled><span class="badge badge-circle">2</span> WHEN & WHERE</a></li>
                    <li class="nav-item" id="ticket"><a href="{{ route('event.event_post_ticket') }}" class="nav-link py-4 border-right" id="ticket_a" disabled><span class="badge badge-circle">3</span> TICKETS</a></li>
                    <li class="nav-item" id="custom"><a href="{{ route('event.event_post_custom') }}" class="nav-link py-4" id="custom_a" disabled><span class="badge badge-circle">4</span> CUSTOMIZE</a></li>
                </ul>
            </nav>