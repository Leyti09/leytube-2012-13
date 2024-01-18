<?php
	if(isset($_SESSION['siteusername'])) {
        $stmt = $__db->prepare("UPDATE users SET ip = :ip WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['siteusername']);
		$stmt->bindParam(":ip",       $_SERVER["HTTP_CF_CONNECTING_IP"]);
        $stmt->execute();

		$stmt = $__db->prepare("UPDATE users SET lastlogin = now() WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['siteusername']);
        $stmt->execute();
	}

	if(isset($_SESSION['siteusername']) && !$__user_h->user_exists(@$_SESSION['siteusername'])) {
		die("The currently logged in channel has been deleted!");
	}
	
	ini_set('display_errors', 0);
?>
<?php $_user222 = $__user_h->fetch_user_username($_SESSION['siteusername']); ?>
<div id="yt-masthead-container" class="yt-grid-box">
    <div id="yt-masthead" class="">
        <a id="logo-container" href="/" title="YouTube home"><img id="logo" src="//s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="YouTube home"></a>
	<?php if(!isset($_SESSION['siteusername']) && !isset($_SESSION['plususer'])) { ?>
        <div id="yt-masthead-signin"><button href="/sign_in" type="button" class=" yt-uix-button yt-uix-button-primary" onclick=";window.location.href=this.getAttribute('href');return false;" role="button"><span class="yt-uix-button-content">Sign in </span></button></div>
	<?php } else { ?>
		<div id="masthead-user-bar-container">
			<div id="masthead-user-bar">
				<div id="yt-masthead-user">
  <span id="yt-masthead-user-displayname" dir="ltr" class="yt-valign-container" onclick="yt.www.masthead.toggleExpandedMasthead();">
    <?php if($_user222['title'])	{	?><?php echo htmlspecialchars($_user222['title']); ?><?php } else {	?><?php echo htmlspecialchars($_user222['username']); ?><?php	}	?>
  </span>
<?php if($__user_h->fetch_unread_pms($_SESSION['siteusername']) != 0) { ?>
							<button type="button" onclick=";window.location.href=this.getAttribute('href');return false;" href="/inbox/" class="sb-notif-on yt-uix-button yt-uix-button-default yt-uix-button-size-default" id="sb-button-notify" role="button"><span class="yt-uix-button-content"><?php echo $__user_h->fetch_unread_pms($_SESSION['siteusername']); ?></span></button>
					<?php } else { ?>
							<button type="button" onclick=";window.location.href=this.getAttribute('href');return false;" href="/inbox/" class="sb-notif-off yt-uix-button yt-uix-button-default yt-uix-button-size-default" id="sb-button-notify" role="button"><span class="yt-uix-button-content"><?php echo $__user_h->fetch_unread_pms($_SESSION['siteusername']); ?></span></button>
					<?php } ?>
  <button class="yt-masthead-user-icon yt-uix-button yt-uix-button-default yt-uix-button-size-default" type="button" onclick="yt.www.masthead.toggleExpandedMasthead();;return false;" data-orientation="vertical" role="button"><span class="yt-uix-button-content">      <span class="video-thumb  yt-thumb yt-thumb-27">
      <span class="yt-thumb-square">
        <span class="yt-thumb-clip">
          <span class="yt-thumb-clip-inner">
            <img src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($_SESSION['siteusername']); ?>" alt="Thumbnail" width="27">
            <span class="vertical-align"></span>
          </span>
        </span>
      </span>
    </span>

 </span></button>
    <span id="yt-masthead-dropdown" onclick="yt.www.masthead.toggleExpandedMasthead();"></span>
</div>
			</div>
		</div>
	<?php } ?>
        <div id="yt-masthead-content">
            <span id="masthead-upload-button-group"><a href="/new_upload" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-default" data-sessionlink="ei=7pFAUZzAG52shAGGr4DACw"><span class="yt-uix-button-content">Upload</span></a></span>
            <form id="masthead-search" class="search-form consolidated-form" action="/results" onsubmit="if (_gel('masthead-search-term').value == '') return false;">
                <button dir="ltr" tabindex="2" type="submit" id="search-btn" class="search-btn-component search-button yt-uix-button yt-uix-button-default" onclick="if (_gel('masthead-search-term').value == '') return false; _gel('masthead-search').submit(); return false;;return true;" role="button"><span class="yt-uix-button-content">Search </span></button>
                <div id="masthead-search-terms" class="masthead-search-terms-border" dir="ltr"><label><input id="masthead-search-term" class="search-term yt-uix-form-input-bidi" name="search_query" value="" type="text" tabindex="1" title="Search"></label></div>
            </form>
        </div>
    </div>
</div>
<?php if(isset($_GET['error'])) { ?>
	<div id="masthead_child_div" style="width: 970px;margin: auto;"><div class="yt-alert yt-alert-default yt-alert-error ">  <div class="yt-alert-icon">
		<img src="//s.ytimg.com/yt/img/pixel-vfl3z5WfW.gif" class="icon master-sprite" alt="Alert icon">
	</div>
	<div class="yt-alert-buttons"></div><div class="yt-alert-content" role="alert">    <span class="yt-alert-vertical-trick"></span>
		<div class="yt-alert-message">
			<?php echo htmlspecialchars($_GET['error']); ?>
		</div>
	</div></div></div>
<?php } ?>
<?php if(isset($_GET['success'])) { ?>
	<div id="masthead_child_div" style="width: 970px;margin: auto;"><div class="yt-alert yt-alert-default yt-alert-success ">  <div class="yt-alert-icon">
		<img src="//s.ytimg.com/yt/img/pixel-vfl3z5WfW.gif" class="icon master-sprite" alt="Alert icon">
	</div>
	<div class="yt-alert-buttons"></div><div class="yt-alert-content" role="alert">    <span class="yt-alert-vertical-trick"></span>
		<div class="yt-alert-message">
			<?php echo htmlspecialchars($_GET['success']); ?>
		</div>
	</div></div></div>
<?php } ?>
<?php if(isset($_SESSION['error'])) { ?>
	<div id="masthead_child_div" style="width: 970px;margin: auto;"><div class="yt-alert yt-alert-default yt-alert-error">  <div class="yt-alert-icon">
		<img src="//s.ytimg.com/yt/img/pixel-vfl3z5WfW.gif" class="icon master-sprite" alt="Alert icon">
	</div>
	<div class="yt-alert-buttons"></div><div class="yt-alert-content" role="alert">    <span class="yt-alert-vertical-trick"></span>
		<div class="yt-alert-message">
			<?php echo $_SESSION['error']->message; ?>
		</div>
	</div></div></div>
	<?php unset($_SESSION['error']); ?>
<?php } ?>
<?php if(isset($_SESSION['errormsg'])) { ?>
	<div id="masthead_child_div" style="width: 970px;margin: auto;"><div class="yt-alert yt-alert-default yt-alert-error">  <div class="yt-alert-icon">
		<img src="//s.ytimg.com/yt/img/pixel-vfl3z5WfW.gif" class="icon master-sprite" alt="Alert icon">
	</div>
	<div class="yt-alert-buttons"></div><div class="yt-alert-content" role="alert">    <span class="yt-alert-vertical-trick"></span>
		<div class="yt-alert-message">
			<?php echo $_SESSION['errormsg'] ?>
		</div>
	</div></div></div>
	<?php unset($_SESSION['errormsg']); ?>
<?php } ?>
<?php if(!isset($_SESSION['plususer'])) { ?>
<?php if(isset($_SESSION['siteusername'])) { ?>
<?php	$_subslol = $__user_h->fetch_subs_count($_SESSION['siteusername']);	?>
<div id="masthead-expanded" class="hid" style="display: none;height: 165px;">
	<div id="masthead-expanded-container" style="height: 142px;" class="with-sandbar">
			<div id="masthead-expanded-menus-container">
			<span id="masthead-expanded-menu-shade"></span>
			<div id="masthead-expanded-menu" class="">
				<ul id="masthead-expanded-menu-list">
					<li class="masthead-expanded-menu-item">
						<a href="/user/<?php echo htmlspecialchars($_SESSION['siteusername']); ?>" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">My channel</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/my_videos" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">
						Video Manager
						</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/subscriptions" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">Subscriptions</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/inbox/" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">Inbox <?php if($__user_h->fetch_unread_pms($_SESSION['siteusername']) != 0) { ?>(<?php echo $__user_h->fetch_unread_pms($_SESSION['siteusername']); ?>)<?php	}	?>
					</li>				
					<li class="masthead-expanded-menu-item">
						<a href="/account">
							Settings
						</a>
					</li>
							<?php
								if(!empty($_user222['claimedacc'])) { ?>
							<li class="masthead-expanded-menu-item">
								<a href="/claim_inactive_channel/login1">
								Switch to <?php echo htmlspecialchars($_user222['claimedacc']); ?>
								</a>
							</li>
							<?php } ?>
							<li class="masthead-expanded-menu-item">
								<a class="end" href="/logout">
								Log out
								</a>
							</li>
				</ul>
			</div>
			<div id="masthead-expanded-google-menu">
				<div id="masthead-expanded-menu-google-container">
					<div id="masthead-expanded-menu-google-column2">
						<div id="masthead-expanded-menu-account-container">
							<img id="masthead-expanded-menu-gaia-photo" alt="" data-src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($_SESSION['siteusername']); ?>" src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($_SESSION['siteusername']); ?>">
							<div id="masthead-expanded-menu-account-info" class="email-only">
								<p>
									<?php if($_user222['title'])	{	?>
									<?php echo htmlspecialchars($_user222['title']); ?>
									<?php } else {	?>
									<?php echo htmlspecialchars($_user222['username']); ?>
									<?php	}	?>
								</p>
								<p id="masthead-expanded-menu-email"><?php	echo $_subslol	?> subscribers</p>
							</div>
						</div>
						<ul>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } } ?>
<?php if(isset($_SESSION['plususer'])) { ?>
<?php	$_subslol = $__user_h->fetch_subs_count($_SESSION['siteusername']);	?>
<?php $deez = $__user_h->fetch_plus($_SESSION['plususer']); ?>
<div id="masthead-expanded" class="hid" style="display: none;height: 165px;">
	<div id="masthead-expanded-container" style="height: 142px;" class="with-sandbar">
			<div id="masthead-expanded-menus-container">
			<span id="masthead-expanded-menu-shade"></span>
			<div id="masthead-expanded-menu" class="">
				<ul id="masthead-expanded-menu-list">
					<?php if(isset($_SESSION['siteusername'])) { ?>
					<li class="masthead-expanded-menu-item">
						<a href="/user/<?php echo htmlspecialchars($_SESSION['siteusername']); ?>" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">My channel</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/my_videos" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">
						Video Manager
						</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/subscriptions" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">Subscriptions</a>
					</li>
					<li class="masthead-expanded-menu-item">
						<a href="/inbox/" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">Inbox <?php if($__user_h->fetch_unread_pms($_SESSION['siteusername']) != 0) { ?>(<?php echo $__user_h->fetch_unread_pms($_SESSION['siteusername']); ?>)<?php	}	?>
					</li>
					<?php } else{ ?>
					<li class="masthead-expanded-menu-item">
						<a href="/channels" class="yt-uix-sessionlink" data-sessionlink="ei=nn0KUubpEcL8kwLQ5oGQDA&amp;feature=mhee">Manage channels</a>
					</li>
					<?php } ?>
					<li class="masthead-expanded-menu-item">
						<a href="/account">
							Settings
						</a>
					</li>
							<?php
								if(!empty($_user222['claimedacc'])) { ?>
							<!-- Insert logging into claimed channels here or something -->
							<?php } ?>
							<li class="masthead-expanded-menu-item">
								<a class="end" href="/logout">
								Log out
								</a>
							</li>
				</ul>
			</div>
			<div id="masthead-expanded-google-menu">
				<div id="masthead-expanded-menu-google-container">
					<div id="masthead-expanded-menu-google-column2">
						<div id="masthead-expanded-menu-account-container">
							<img id="masthead-expanded-menu-gaia-photo" alt="" data-src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($_SESSION['siteusername']); ?>" src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($_SESSION['siteusername']); ?>">
							<div id="masthead-expanded-menu-account-info" class="email-only">
								<p><?php if(isset($_SESSION['siteusername'])) { ?>
									<?php if($_user222['title'])	{	?>
									<?php echo htmlspecialchars($_user222['title']); ?>
									<?php } else {	?>
									<?php echo htmlspecialchars($_user222['username']); ?>
									<?php	}	?>
								</p><?php } else{ ?><?php echo htmlspecialchars($_SESSION['plususer']); ?><?php } ?>
								<p id="masthead-expanded-menu-email"><?php if(isset($_SESSION['siteusername'])) { ?><?php	echo $_subslol	?> subscribers<?php } else{ ?><?php if($deez['channels'] == '[]') { ?>No channels<?php } else{ ?>Not logged into a channel<?php } ?><?php } ?></p>
							</div>
						</div>
						<ul>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>