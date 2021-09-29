<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string|null $coupon_code
 * @property float|null $discount
 * @property \Illuminate\Support\Carbon|null $expiry_date
 * @property string $type Value can be android, web or ios
 * @property string $limit_users
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @method static \Database\Factories\CouponFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereLimitUsers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CouponUsed
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property int $coupon_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon $coupon
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CouponUsedFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsed whereUserId($value)
 */
	class CouponUsed extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $lat
 * @property string|null $lng
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip
 * @property string|null $apartment
 * @property string|null $street
 * @property string|null $instructions
 * @property string|null $default
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DeliveryAddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress newQuery()
 * @method static \Illuminate\Database\Query\Builder|DeliveryAddress onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereApartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryAddress whereZip($value)
 * @method static \Illuminate\Database\Query\Builder|DeliveryAddress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DeliveryAddress withoutTrashed()
 */
	class DeliveryAddress extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $per_km_mile_charge
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @method static \Database\Factories\DeliveryTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType newQuery()
 * @method static \Illuminate\Database\Query\Builder|DeliveryType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType wherePerKmMileCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DeliveryType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DeliveryType withoutTrashed()
 */
	class DeliveryType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GoodType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\GoodTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType newQuery()
 * @method static \Illuminate\Database\Query\Builder|GoodType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|GoodType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|GoodType withoutTrashed()
 */
	class GoodType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Meta
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string $type
 * @property string $group
 * @property string|null $metaable_type
 * @property int|null $metaable_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $metaable The Metamorphic relationship
 * @method static \Database\Factories\MetaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta newQuery()
 * @method static \Illuminate\Database\Query\Builder|Meta onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereMetaableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereMetaableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meta whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Meta withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Meta withoutTrashed()
 */
	class Meta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $package_size_id
 * @property int $good_type_id
 * @property int $delivery_type_id
 * @property int $coupon_id
 * @property float $price
 * @property float|null $discount
 * @property float $delivery_fee
 * @property string $is_cash_on_delivery
 * @property float $total
 * @property string|null $item_title
 * @property string|null $item_description
 * @property \Illuminate\Support\Carbon $pickup_datetime
 * @property string|null $sender_name
 * @property string|null $sender_email
 * @property string|null $sender_phone
 * @property string|null $receiver_name
 * @property string|null $receiver_email
 * @property string|null $receiver_phone
 * @property string|null $sender_location_lat
 * @property string|null $sender_location_lng
 * @property string|null $sender_location_string
 * @property string|null $sender_address_detail
 * @property string|null $receiver_location_lat
 * @property string|null $receiver_location_lng
 * @property string|null $receiver_location_string
 * @property string|null $receiver_address_detail
 * @property string $status pending, accepted,completed,cancelled,assigned-to-rider
 * @property string|null $signature
 * @property string|null $map
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon $coupon
 * @property-read \App\Models\DeliveryType $deliveryType
 * @property-read \App\Models\GoodType $goodType
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\PackageSize $packageSize
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGoodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsCashOnDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereItemDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereItemTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePackageSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePickupDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverAddressDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverLocationLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverLocationLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverLocationString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiverPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderAddressDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderLocationLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderLocationLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderLocationString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSenderPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderSession
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderSessionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSession whereUserId($value)
 */
	class OrderSession extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderTransaction
 *
 * @property int $id
 * @property int $order_id
 * @property string|null $type
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\Order $order
 * @method static \Database\Factories\OrderTransactionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction withoutTrashed()
 */
	class OrderTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PackageSize
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $price
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\PackageSizeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize newQuery()
 * @method static \Illuminate\Database\Query\Builder|PackageSize onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageSize whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PackageSize withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PackageSize withoutTrashed()
 */
	class PackageSize extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\PermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RiderOrder
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $assign_datetime
 * @property string $rider_response pending, accept, cancel
 * @property \Illuminate\Support\Carbon $rider_response_datetime
 * @property string $user_response accept, cancel
 * @property \Illuminate\Support\Carbon $user_response_datetime
 * @property \Illuminate\Support\Carbon $on_the_way_to_pickup
 * @property \Illuminate\Support\Carbon $pickup_datetime
 * @property \Illuminate\Support\Carbon $on_the_way_to_dropoff
 * @property \Illuminate\Support\Carbon $delivered
 * @property string|null $notification
 * @property string $admin_response active, cancel
 * @property \Illuminate\Support\Carbon $admin_response_datetime
 * @property string|null $map
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\RiderOrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|RiderOrder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereAdminResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereAdminResponseDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereAssignDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereOnTheWayToDropoff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereOnTheWayToPickup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder wherePickupDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereRiderResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereRiderResponseDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereUserResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiderOrder whereUserResponseDatetime($value)
 * @method static \Illuminate\Database\Query\Builder|RiderOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RiderOrder withoutTrashed()
 */
	class RiderOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $stripe_id
 * @property string|null $pm_type
 * @property string|null $pm_last_four
 * @property string|null $trial_ends_at
 * @property string $mobile
 * @property string|null $mobile_verified_at
 * @property string|null $first_name
 * @property string|null $deleted_at
 * @property string|null $lat
 * @property string|null $lng
 * @property string|null $gender
 * @property string|null $city
 * @property string|null $state
 * @property string|null $date_of_birth
 * @property int $is_online
 * @property int $is_active
 * @property string|null $device
 * @property string|null $ip_address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DeliveryAddress[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserDocument[] $documents
 * @property-read int|null $documents_count
 * @property mixed $country
 * @property-read mixed $name
 * @property-read string $profile_photo_url
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\OrderSession|null $order_session
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Nagy\LaravelRating\Models\Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RiderOrder[] $rider_oder
 * @property-read int|null $rider_oder_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User admins($role = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User customer($role = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User drivers($role = [])
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User nearestDrivers($latitude = 0, $longitude = 0, $radius = 400)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobileVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \Fouladgar\MobileVerification\Contracts\MustVerifyMobile {}
}

namespace App\Models{
/**
 * App\Models\UserDocument
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $type
 * @property string|null $attachment
 * @property string $status pending, rejected, confirmed
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $meta
 * @property-read int|null $meta_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\UserDocumentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDocument whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UserDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserDocument withoutTrashed()
 */
	class UserDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vehicle
 *
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_type_id
 * @property string|null $make
 * @property string|null $model
 * @property string|null $year
 * @property string|null $licence_plate
 * @property string|null $color
 * @property string|null $lat
 * @property string|null $lng
 * @property bool $is_online
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @property-read \App\Models\VehicleType $vehicleType
 * @method static \Database\Factories\VehicleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Query\Builder|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLicencePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|Vehicle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vehicle withoutTrashed()
 */
	class Vehicle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VehicleType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $per_km_mile_charge
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\VehicleTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType newQuery()
 * @method static \Illuminate\Database\Query\Builder|VehicleType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType query()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType wherePerKmMileCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|VehicleType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|VehicleType withoutTrashed()
 */
	class VehicleType extends \Eloquent {}
}

