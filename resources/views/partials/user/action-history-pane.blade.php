<div class="box box-primary no-box-shadow">
<div class="box-header">
	<h3 class="box-title"><i class="fa fa-history"></i>{{ _('Action History') }}</h3>
</div>

<style>
.timeline {
    position: relative;
    padding-bottom: 30px;
    margin-bottom: 20px;
}
.timeline:before {
    width: 4px;
    top: 0;
    margin-left: -2px;
}
.timeline:after {
    width: 12px;
    height: 12px;
    margin-left: -6px;
    border-radius: 999999px;
    background: #e1e1e1;
}
.timeline:after, .timeline:before {
    content: "";
    display: block;
    position: absolute;
    left: 30px;
    bottom: 0;
}

@media (min-width: 768px)
.timeline:after, .timeline:before {
    left: 100px;
}

.tl-header.now {
    margin-top: 0;
}
@media (min-width: 768px)
.tl-header {
    left: 100px;
    margin-left: -70px;
}
.tl-header {
    position: relative;
    width: 140px;
    padding: 8px 0;
    text-align: center;
    left: 0;
    margin-left: 0;
    margin-top: 40px;
    margin-bottom: 40px;
    font-size: 14px;
    border-radius: 2px;
}
.tl-header, .tl-icon {
    box-shadow: 0 0 0 4px #fafafa;
}

@media (min-width: 768px)
.tl-entry {
    margin-left: 100px;
    margin-bottom: 20px;
}
.tl-entry {
    margin-left: 30px;
    margin-right: 0;
    padding-left: 36px;
    padding-right: 0;
    position: relative;
    margin-bottom: 40px;
}

.tl-entry:before {
    background: #67cea6;
    box-shadow: 0 0 0 3px #fafafa;
    content: "";
    display: block;
    position: absolute;
    width: 6px;
    height: 6px;
    left: -3px;
    right: auto;
    border-radius: 999999px;
    top: 20px;
}
.tl-entry:after, .tl-entry:before {
    content: " ";
    display: table;
}
.tl-entry:after {
    clear: both;
}


@media (min-width: 768px)
.tl-time {
    left: auto;
    right: 100%;
    margin-left: 0;
    margin-right: 32px;
    top: 14px;
}
.tl-time {
    position: absolute;
    left: auto;
    right: auto;
    margin-left: 0;
    margin-right: 0;
    text-align: right;
    white-space: nowrap;
    color: #888;
    top: -22px;
    font-size: 13px;
}

.tl-icon {
    display: block;
    position: absolute;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 999999px;
    left: -20px;
    right: auto;
    top: 4px;
    text-align: center;
    font-size: 14px;
    overflow: hidden;
}
.tl-body {
    position: relative;
    padding: 15px;
    margin: 0;
    /* border: 1px solid #B13F3F; */
    /* margin-bottom: 22px; */
    position: relative;
    -webkit-box-shadow: none;
    /* box-shadow: none; */
    margin-bottom: 18px;
    background-color: #fff;
    border: 1px solid #D4D0D0;
    border-radius: 2px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    /* border: 1px solid #000; */
}
.tl-body:before {
    content: "";
    display: block;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent #dcdcdc transparent transparent;
    border-width: 8px 9px 8px 0;
    position: absolute;
    left: -9px;
    right: auto;
    top: 15px;
}
.tl-body:after {
    content: "";
    display: block;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 7px 8px 7px 0;
    border-color: transparent #fff transparent transparent;
    position: absolute;
    left: -8px;
    right: auto;
    top: 16px;
}

.timeline h4 {
    margin: 0;
    padding: 0;
    font-weight: 300;
}
</style>

	<div class="timeline">
			<div class="tl-header now nuts-bg-indigo nuts-text-white">Now</div>
			@for( $n=0; $n<count($history); $n++ )
				<div class="tl-entry">
					<div class="tl-time">{{ $history[$n]->created_at }}</div>
					@if( $history[$n]->activity !== "ACTION" )
						<div class="tl-icon nuts-bg-aqua nuts-text-white"><i class="fa fa-user"></i></div>						
					@endif


					<div class="panel tl-body">
						@if( $history[$n]->message === "CREATED_USER_ACCOUNT" )
							<h4>{{ _('Created account.') }}</h4>
							<div class="well well-sm" style="margin: 10px 0 0 0;">
								{{ _('Welcome to the Nuts Pages !!') }}<br>
								<br>
								Enjoy :-)
							</div>
						@elseif( $history[$n]->message === "SIGNED_IN" )
							{{ _('Signed in.') }}
						@elseif( $history[$n]->message === "UPDATED_USER_NAME" )
							{{ _('Updated user name.') }}
						@elseif( $history[$n]->message === "UPDATED_EMAIL_ADDRESS" )
							{{ _('Updated e-mail address.') }}
						@else
							{{ $history[$n]->activity }}: {{ $history[$n]->message }}
						@endif
					</div>
				</div>
			@endfor
	</div>

</div>
