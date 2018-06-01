<?php

namespace App\Models\Video\Traits\Attributes;

/**
 * Trait CategoryAttribute.
 */
trait CategoryAttribute
{
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<span class='badge badge-success'>".__('labels.general.active').'</span>';
        }

        return "<span class='badge badge-danger'>".__('labels.general.inactive').'</span>';
    }

    //public function getTitleAttribute()
    //{
    //    return $this->title;
    //}

    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.video.category.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    public function getStatusButtonAttribute()
    {

        switch ($this->active) {
            case 'active':
                return '<a href="'.route('admin.video.category.mark', [
                        $this,
                        'active',
                    ]).'" class="dropdown-item">'.__('buttons.general.activate').'</a> ';
            // No break

            case 1:
                return '<a href="'.route('admin.video.category.mark', [
                        $this,
                        'passive',
                    ]).'" class="dropdown-item">'.__('buttons.general.deactivate').'</a> ';
            // No break

            default:
                return '';
            // No break
        }


        return '';
    }

    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.video.category.destroy', $this).'"
             class="btn btn-danger sweet_delete_button"
             data-method="delete"
             data-trans-button-cancel="'.__('buttons.general.cancel').'"
             data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
             data-trans-title="'.__('strings.backend.general.are_you_sure').'">
             <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';



    }

    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.video.category.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.category.delete_permanently').'"></i></a> ';
    }

    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.video.category.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.category.restore_category').'"></i></a> ';
    }

    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
				<div class="btn-group btn-group-sm" role="group" aria-label="Category Actions">
				  '.$this->restore_button.'
				  '.$this->delete_permanently_button.'
				</div>';
        }

        return '
    	     <div class="btn-group btn-group-sm" role="group" aria-label="Category Actions">
		          '.$this->edit_button.'
              '.$this->status_button.'
              '.$this->delete_button.'
		       </div>
        ';
    }
}
