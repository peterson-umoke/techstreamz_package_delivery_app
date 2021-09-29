<?php

namespace App\Library;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Hasmeta
{
    /**
     * Get all the metas.
     * @return MorphMany
     */
    public function meta(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metaable');
    }

    /**
     * used to  get metadata model
     * @param string $key
     * @param string $group
     * @return Model|MorphMany|null
     */
    public function getModelMeta(string $key, string $group = "default"): Model|MorphMany|null
    {
        return $this->meta()->where('key', $key)->where('group', $group)->first();
    }

    /**
     * used to  get metadata
     * @param string $key
     * @param string $group
     * @return mixed
     */
    public function getMeta(string $key, string $group = "default"): mixed
    {
        return $this->getModelMeta($key, $group)->value;
    }

    /**
     * used to  get metadata
     * @param string $key
     * @param string $value
     * @param string $group
     * @return Model
     */
    public function setMeta(string $key, string $value, string $group = "default"): Model
    {
        $attributes = [
            'key' => $key,
            'value' => $value,
            'group' => $group
        ];
        return $this->meta()->create($attributes);
    }

    /**
     * @param string $key
     * @param string $group
     * @return bool
     */
    public function existMeta(string $key, string $group = 'default'): bool
    {
        return $this->meta()->where('key', $key)->where('group', $group)->exists();
    }

    /**
     * used to  delete metadata
     * @param string $key
     * @param string $group
     * @return mixed
     */
    public function deleteMeta(string $key, string $group = "default"): mixed
    {
        return $this->meta()->where('key', $key)->where('group', $group)->delete();
    }

    /**
     * @param string $key
     * @param string $value
     * @param string $group
     * @return Model
     */
    public function replaceMeta(string $key, string $value = "", string $group = ""): Model
    {
        $this->deleteMeta($key, $group);
        return $this->setMeta($key, $value, $group);
    }
}
