<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!$post['message'] && (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))) { ?>
<div class="box">
    <a href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;page=<?php echo $page;?>">
    <span>添加柜台介绍</span>
    </a>
</div>
<?php } else { ?>
 <div class="postmessage">
 <?php echo $post['message'];?>
 </div>
<?php } if(count($trades) > 1 || ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])) { ?>
<div class="box">
<em>商品数: <?php echo $tradenum;?></em>
<?php if(!$_G['forum_thread']['is_archived'] && ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])) { ?>
<span class="xi1">请您使用非手机版管理商品</span>
<?php } ?>
</div>
<?php } if($tradenum) { if($trades) { ?>
        <?php if(is_array($trades)) foreach($trades as $key => $trade) { ?>            <div id="trade<?php echo $trade['pid'];?>" class="box">
                <div>
                    <?php if($trade['displayorder'] > 0) { ?><em class="hot">推荐商品</em><?php } ?>
                    <?php if($trade['thumb']) { ?>
                        <img src="<?php echo $trade['thumb'];?>" width="<?php if($trade['width'] > 90) { ?>90<?php } else { ?><?php echo $trade['width'];?><?php } ?>" _width="90" _height="90" alt="<?php echo $trade['subject'];?>" />
                    <?php } else { ?>
                        <img src="<?php echo IMGDIR;?>/nophotosmall.gif" width="90" height="90" alt="<?php echo $trade['subject'];?>" />
                    <?php } ?>
                </div>
                <div>
                    <h4><?php echo $trade['subject'];?></h4>
                    <dl>
                        <dt>商品类型:
                            <?php if($trade['quality'] == 1) { ?>全新<?php } ?>
                            <?php if($trade['quality'] == 2) { ?>二手<?php } ?>
                            商品
                        </dt>
                        <dt>剩余时间:
                        <?php if($trade['closed']) { ?>
                            <em>成交结束</em>
                        <?php } elseif($trade['expiration'] > 0) { ?>
                            <?php echo $trade['expiration'];?>天<?php echo $trade['expirationhour'];?>小时
                        <?php } elseif($trade['expiration'] == -1) { ?>
                            <em>成交结束</em>
                        <?php } else { ?>
                            &nbsp;
                        <?php } ?>
                        </dt>
                    </dl>
                    <div>
                        <?php if($trade['price'] > 0) { ?>
                            <strong><?php echo $trade['price'];?></strong>&nbsp;元&nbsp;&nbsp;
                        <?php } ?>
                        <?php if($_G['setting']['creditstransextra']['5'] != -1 && $trade['credit']) { ?>
                            <?php if($trade['price'] > 0) { ?>附加 <?php } ?><strong><?php echo $trade['credit'];?></strong>&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?>
                        <?php } ?>
                        <p class="xg1">
                            <?php if($trade['costprice'] > 0) { ?>
                                <del><?php echo $trade['costprice'];?> 元</del>
                            <?php } ?>
                            <?php if($_G['setting']['creditstransextra']['5'] != -1 && $trade['costcredit'] > 0) { ?>
                                <del><?php if($trade['costprice'] > 0) { ?>附加 <?php } ?><?php echo $trade['costcredit'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></del>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } } ?>
<div id="postmessage_<?php echo $post['pid'];?>"><?php echo $post['counterdesc'];?></div>
<?php } else { ?>
<div class="locked">本柜台无商品</div>
<?php } ?>
