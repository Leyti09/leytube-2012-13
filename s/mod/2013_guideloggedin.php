<div id="guide">        <div id="guide-container" class=" vve-check" data-sessionlink="ved=CAEQ_h4&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ">
      <div id="guide-main" class="    guide-module     spf-nolink     yt-uix-tdl " data-fold="198.10000038146973,652.8000030517578">
        <div class="guide-module-toggle">
          <span class="guide-module-toggle-icon">
            <span class="guide-module-toggle-arrow"></span>
            <img src="//s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="">
            <img src="//s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="" id="collapsed-notification-icon">
          </span>
          <div class="guide-module-toggle-label">
            <h3>
              <span>
Guide
              </span>
            </h3>
          </div>
        </div>
          <div class="guide-module-content yt-scrollbar">
    <ul class="guide-toplevel">
            <li class="guide-section vve-check" data-sessionlink="ved=CAIQ5isoAA&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ">
    <div class="guide-item-container personal-item">
      <ul class="guide-user-links yt-box">
            <li class="vve-check guide-channel" id="UCdJDMvA1JEGkPIUsxVgfOrg-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink guide-item" href="/user/<?php echo htmlspecialchars($_SESSION['siteusername']); ?>" title="<?php echo htmlspecialchars($_SESSION['siteusername']); ?>" data-sessionlink="feature=g-personal&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="UCdJDMvA1JEGkPIUsxVgfOrg">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span><?php echo htmlspecialchars($_SESSION['siteusername']); ?></span>
      </span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="watch_later-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/feed/watch_later" title="Watch Later" data-sessionlink="feature=g-personal&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="watch_later">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span>Watch Later</span>
      </span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="history-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/feed/history" title="Watch History" data-sessionlink="feature=g-personal&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="history">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span>Watch History</span>
      </span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="playlists-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/feed/playlists" title="Playlists" data-sessionlink="feature=g-personal&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="playlists">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span>Playlists</span>
      </span>
    </span>

  </a>

  </li>

      </ul>
    </div>
    <hr class="guide-section-separator">
  </li>

            <li class="guide-section vve-check" data-sessionlink="ved=CAcQ5isoAQ&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ">
    <div class="guide-item-container personal-item">
      <ul class="guide-user-links yt-box">
            <li class="vve-check guide-channel" id="what_to_watch-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink guide-item-selected" href="/" title="What to watch" data-sessionlink="feature=g-system&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="what_to_watch">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span>What to watch</span>
      </span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="subscriptions-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/feed/subscriptions" title="My subscriptions" data-sessionlink="feature=g-system&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="subscriptions">
    <span class="yt-valign-container">
      <span class="display-name">
        <span>My subscriptions</span>
      </span>
    </span>

          <span class="guide-count yt-uix-tooltip yt-valign">
      <span class="yt-valign-container">1</span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="social-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/feed/social" title="Social" data-sessionlink="feature=g-system&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="social">
    <span class="yt-valign-container">
      <span class="display-name no-count">
        <span>Social</span>
      </span>
    </span>

  </a>

  </li>

      </ul>
    </div>
    <hr class="guide-section-separator">
  </li>

            <li id="guide-subscription-suggestions-section" class="guide-section guide-section-no-counts">
                    <div class="guide-recommendations-list">
                        <div class="guide-channels-content">
                            <ul class="guide-channels-list guide-item-container yt-uix-scroller filter-has-matches">
                            <?php if(!isset($_SESSION['siteusername'])) { ?>
							              <h3>
											Channels for you
											</h3>
                                    <?php foreach($__server->featured_channels as $channel) { ?>
										<?php $_user22 = $__user_h->fetch_user_username($channel); ?>
                                        <li class="guide-channel">
                                            <a class="guide-item yt-uix-sessionlink  narrow-item" href="/user/<?php echo htmlspecialchars($channel); ?>" title="<?php echo htmlspecialchars($channel); ?>" data-channel-id="UCF1cWZk-kVBrN9AM_ey7qdQ" data-featured="1" data-sessionlink="ei=7pFAUZzAG52shAGGr4DACw&amp;feature=g-featured">
                                            <span class="thumb"><span class="video-thumb ux-thumb yt-thumb-square-18 "><span class="yt-thumb-clip"><span class="yt-thumb-clip-inner"><img src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($channel); ?>" alt="Thumbnail" data-thumb-manual="1" data-thumb="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($channel); ?>" data-group-key="guide-channel-thumbs" width="18"><span class="vertical-align"></span></span></span></span></span>
                                            <span class="display-name">
                                            <span>
												<?php if($_user22['title'])	{	?>
												<?php echo htmlspecialchars($_user22['title']); ?>
												<?php } else {	?>
												<?php echo htmlspecialchars($_user22['username']); ?>
												<?php	}	?>
											</span>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } } else { ?>
							                <h3>
												Subscriptions
											</h3>
                                    <?php
                                        $stmt = $__db->prepare("SELECT * FROM subscribers WHERE sender = :username ORDER BY id DESC LIMIT 20");
                                        $stmt->bindParam(":username", $_SESSION['siteusername']);
                                        $stmt->execute();
                                        while($channel = $stmt->fetch(PDO::FETCH_ASSOC)) { $channel = $channel['reciever']; ?>
										<?php $_user22 = $__user_h->fetch_user_username($channel); ?>
                                        <li class="guide-channel">
                                            <a class="guide-item yt-uix-sessionlink  narrow-item" href="/user/<?php echo htmlspecialchars($channel); ?>" title="<?php echo htmlspecialchars($channel); ?>" data-channel-id="UCF1cWZk-kVBrN9AM_ey7qdQ" data-featured="1" data-sessionlink="ei=7pFAUZzAG52shAGGr4DACw&amp;feature=g-featured">
                                            <span class="thumb"><span class="video-thumb ux-thumb yt-thumb-square-18 "><span class="yt-thumb-clip"><span class="yt-thumb-clip-inner"><img src="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($channel); ?>" alt="Thumbnail" data-thumb-manual="1" data-thumb="/dynamic/pfp/<?php echo $__user_h->fetch_pfp($channel); ?>" data-group-key="guide-channel-thumbs" width="18"><span class="vertical-align"></span></span></span></span></span>
                                            <span class="display-name">
                                            <span>												
												<?php if($_user22['title'])	{	?>
												<?php echo htmlspecialchars($_user22['title']); ?>
												<?php } else {	?>
												<?php echo htmlspecialchars($_user22['username']); ?>
												<?php	}	?></span>
                                            </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
    <hr class="guide-section-separator">
  </li>

            <li class="guide-section vve-check" data-sessionlink="ved=CFMQ5isoAw&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ">
    <div class="guide-item-container personal-item">
      <ul class="guide-user-links yt-box">
            <li class="vve-check guide-channel" id="guide_builder-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/channels" title="Browse channels" data-sessionlink="feature=g-manage&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="guide_builder">
    <span class="yt-valign-container">
        <span class="thumb guide-management-plus-icon">
          <img src="//s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="">
        </span>
      <span class="display-name no-count">
        <span>Browse channels</span>
      </span>
    </span>

  </a>

  </li>

            <li class="vve-check guide-channel" id="subscription_manager-guide-item">
        <a class="guide-item yt-uix-sessionlink yt-valign spf-nolink " href="/subscription_manager" title="Manage subscriptions" data-sessionlink="feature=g-manage&amp;ei=pXFHUo_hC7DyiAaR_IGIAQ" data-channel-id="subscription_manager">
    <span class="yt-valign-container">
        <span class="thumb guide-management-settings-icon">
          <img src="//s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="">
        </span>
      <span class=" no-count">
        <span>Manage subscriptions</span>
      </span>
    </span>

  </a>

  </li>

      </ul>
    </div>
    <hr class="guide-section-separator">
  </li>

    </ul>
  </div>

      </div>
        <div id="watch-context-container" class="guide-module collapsed hid"></div>

    </div>

</div>