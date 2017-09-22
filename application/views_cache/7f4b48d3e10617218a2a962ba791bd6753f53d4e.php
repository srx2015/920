<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
    <?php if($page['total_num']): ?>
    <?php echo e($page['total_num']); ?> 条记录
    <?php endif; ?>
    <?php if($page['total_page']): ?>
    <?php echo e($page['page']); ?>/<?php echo e($page['total_page']); ?> 页
    <?php endif; ?>
</div>
<div class="dataTables_paginate paging_bs_normal" id="datatable_paginate">
    <ul class="pagination pagination-sm">
        <li class="prev
            <?php if(!$page['last']): ?>
                disabled
            <?php endif; ?>
        ">
            <a href="<?php echo e($page['url']); ?>p/<?php echo e($page['last']); ?>"><i class="fa fa-caret-left"></i> &nbsp;</a>
        </li>
        <?php for($i = $page['start']; $i <= $page['end']; $i++): ?>
            <li
                <?php if($i == $page['page']): ?>
                    class="active"
                <?php endif; ?>
            >
                <a href="<?php echo e($page['url']); ?>p/<?php echo e($i); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>
        <li class="next
            <?php if(!$page['next']): ?>
                disabled
            <?php endif; ?>
        ">
            <a href="<?php echo e($page['url']); ?>p/<?php echo e($page['next']); ?>">&nbsp;<i class="fa fa-caret-right"></i> </a>
        </li>
    </ul>
</div>