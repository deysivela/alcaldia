import { normalizeUnits } from '../units/aliases';
import { hooks } from '../utils/hooks';
import isFunction from '../utils/is-function';
    return function (value) {
        if (value != null) {
            set(this, unit, value);
            hooks.updateOffset(this, keepTime);
            return this;
        } else {
            return get(this, unit);
        }
    };
}
export function get (mom, unit) {
        mom._d['get' + (mom._isUTC ? 'UTC' : '') + unit]() : NaN;
}
export function set (mom, unit, value) {
    if (mom.isValid()) {
    }
}
// MOMENTS
export function getSet (units, value) {
    var unit;
        for (unit in units) {
        }
    } else {
        units = normalizeUnits(units);
        if (isFunction(this[units])) {
            return this[units](value);
        }
    }
    return this;
}
