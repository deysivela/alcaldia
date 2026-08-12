import { Locale } from "./constructor";
import { defaultCalendar, calendar } from "./calendar";
import { defaultInvalidDate, invalidDate } from "./invalid";
import { defaultOrdinal, ordinal, defaultOrdinalParse } from "./ordinal";
import { preParsePostFormat } from "./pre-post-format";
import { defaultRelativeTime, relativeTime, pastFuture } from "./relative";
import { set } from "./set";
proto._calendar = defaultCalendar;
proto.calendar = calendar;
proto.longDateFormat = longDateFormat;
proto._invalidDate = defaultInvalidDate;
proto.invalidDate = invalidDate;
proto._ordinal = defaultOrdinal;
proto.ordinal = ordinal;
proto._ordinalParse = defaultOrdinalParse;
proto.preparse = preParsePostFormat;
proto.postformat = preParsePostFormat;
proto._relativeTime = defaultRelativeTime;
proto.relativeTime = relativeTime;
proto.pastFuture = pastFuture;
proto.set = set;
// Month
import {
    localeMonthsParse,
    defaultLocaleMonthsShort,
    localeMonthsShort,
    defaultMonthsRegex,
    monthsRegex,
    defaultMonthsShortRegex,
    monthsShortRegex,
} from "../units/month";
proto.months = localeMonths;
proto._months = defaultLocaleMonths;
proto.monthsShort = localeMonthsShort;
proto._monthsShort = defaultLocaleMonthsShort;
proto._monthsRegex = defaultMonthsRegex;
proto.monthsRegex = monthsRegex;
proto._monthsShortRegex = defaultMonthsShortRegex;
proto.monthsShortRegex = monthsShortRegex;
// Week
import {
    localeWeek,
    defaultLocaleWeek,
    localeFirstDayOfYear,
    localeFirstDayOfWeek,
} from "../units/week";
proto.week = localeWeek;
proto._week = defaultLocaleWeek;
proto.firstDayOfYear = localeFirstDayOfYear;
// Day of Week
import {
    localeWeekdaysParse,
    defaultLocaleWeekdays,
    localeWeekdays,
    defaultLocaleWeekdaysMin,
    localeWeekdaysMin,
    defaultLocaleWeekdaysShort,
    localeWeekdaysShort,
    defaultWeekdaysShortRegex,
    weekdaysShortRegex,
    defaultWeekdaysMinRegex,
    weekdaysMinRegex,
} from "../units/day-of-week";
proto.weekdays = localeWeekdays;
proto._weekdays = defaultLocaleWeekdays;
proto.weekdaysMin = localeWeekdaysMin;
proto.weekdaysShort = localeWeekdaysShort;
proto._weekdaysShort = defaultLocaleWeekdaysShort;
proto.weekdaysParse = localeWeekdaysParse;
proto._weekdaysRegex = defaultWeekdaysRegex;
proto._weekdaysShortRegex = defaultWeekdaysShortRegex;
proto.weekdaysShortRegex = weekdaysShortRegex;
proto._weekdaysMinRegex = defaultWeekdaysMinRegex;
proto.weekdaysMinRegex = weekdaysMinRegex;
// Hours
import {
    localeIsPM,
    defaultLocaleMeridiemParse,
    localeMeridiem,
} from "../units/hour";
proto.isPM = localeIsPM;
proto.meridiem = localeMeridiem;
